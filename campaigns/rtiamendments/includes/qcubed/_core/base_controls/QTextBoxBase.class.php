<?php
	/**
	 * This file contains the QTextBoxBase and QCrossScriptingException class.
	 *
	 * @package Controls
	 */

	/**
	 * This class will render an HTML Textbox -- which can either be <input type="text">,
	 * <input type="password"> or <textarea> depending on the TextMode (see below).
	 *
	 * @package Controls
	 *
	 * @property integer $Columns is the "cols" html attribute (applicable for MultiLine textboxes)
	 * @property string $Format
	 * @property string $Text is the contents of the textbox, itself
	 * @property string $LabelForRequired
	 * @property string $LabelForRequiredUnnamed
	 * @property string $LabelForTooShort
	 * @property string $LabelForTooShortUnnamed
	 * @property string $LabelForTooLong
	 * @property string $LabelForTooLongUnnamed
	 * @property string $CrossScripting can be Allow, HtmlEntities, or Deny.  Deny is the default. Prevents cross scripting hacks.  HtmlEntities causes framework to automatically call php function htmlentities on the input data.  Allow allows everything to come through without altering at all.  USE "ALLOW" judiciously: using ALLOW on text entries, and then outputting that data WILL allow hackers to perform cross scripting hacks.
	 * @property integer $MaxLength is the "maxlength" html attribute (applicable for SingleLine textboxes)
	 * @property integer $MinLength is the minimum requred length to pass validation
	 * @property boolean $ReadOnly is the "readonly" html attribute (making a textbox "ReadOnly" is very similar to setting the textbox to Enabled=false.  There are only subtle display-differences, I believe, between the two.
	 * @property integer $Rows is the "rows" html attribute (applicable for MultiLine textboxes)
	 * @property string $TextMode can be "SingleLine", "MultiLine", and "Password".
	 * @property boolean $ValidateTrimmed
	 * @property boolean $Wrap is the "wrap" html attribute (applicable for MultiLine textboxes)
	 */
	abstract class QTextBoxBase extends QControl {
		///////////////////////////
		// Private Member Variables
		///////////////////////////

		// APPEARANCE
		protected $intColumns = 0;
		protected $strText = null;
		protected $strLabelForRequired;
		protected $strLabelForRequiredUnnamed;
		protected $strLabelForTooShort;
		protected $strLabelForTooShortUnnamed;
		protected $strLabelForTooLong;
		protected $strLabelForTooLongUnnamed;
		protected $strFormat = '%s';

		// BEHAVIOR
		protected $intMaxLength = 0;
		protected $intMinLength = 0;
		protected $blnReadOnly = false;
		protected $intRows = 0;
		protected $strTextMode = QTextMode::SingleLine;
		protected $strCrossScripting;
		protected $objHTMLPurifierConfig = null;
		protected $blnValidateTrimmed = false;

		// LAYOUT
		protected $blnWrap = true;

		//////////
		// Methods
		//////////
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);

			$this->strLabelForRequired = QApplication::Translate('%s is required');
			$this->strLabelForRequiredUnnamed = QApplication::Translate('Required');

			$this->strLabelForTooShort = QApplication::Translate('%s must have at least %s characters');
			$this->strLabelForTooShortUnnamed = QApplication::Translate('Must have at least %s characters');

			$this->strLabelForTooLong = QApplication::Translate('%s must have at most %s characters');
			$this->strLabelForTooLongUnnamed = QApplication::Translate('Must have at most %s characters');

			$this->strCrossScripting = QApplication::$DefaultCrossScriptingMode;
		}

		/**
		 * This function allows to set the Configuration for HTMLPurifier
		 * similar to the HTMLPurifierConfig::set() method from the HTMLPurifier API.
		 * 
		 * @param strParameter: The parameter to set for HTMLPurifier
		 * @param mixValue: Value of the parameter.
		 * 
		 * @return None
		 * 
		 *  NOTE: THERE IS NO SUPPORT FOR THE DEPRECATED API OF HTMLPURIFIER, HENCE NO THIRD ARGUMENT TO THE
		 *  	FUNCTION CAN BE PASSED. 
		 * 
		 * Visit http://htmlpurifier.org/live/configdoc/plain.html for the list of parameters and their effects.
		 */
		public function SetPurifierConfig($strParameter, $mixValue) {
			if ($this->objHTMLPurifierConfig != null) {
				$this->objHTMLPurifierConfig->set($strParameter, $mixValue);
			}
		}

		public function ParsePostData() {
			// Check to see if this Control's Value was passed in via the POST data
			if (array_key_exists($this->strControlId, $_POST)) {
				// It was -- update this Control's value with the new value passed in via the POST arguments
				$this->strText = $_POST[$this->strControlId];	
				
				switch ($this->strCrossScripting) {
					case QCrossScripting::Allow:
						// Do Nothing, allow everything
						break;
					case QCrossScripting::HtmlEntities:
						// Go ahead and perform HtmlEntities on the text
						$this->strText = QApplication::HtmlEntities($this->strText);
						break;
					case QCrossScripting::HTMLPurifier:
						// let HTMLPurifier do the job! User should have set it up!
						$objPurifier = new HTMLPurifier($this->objHTMLPurifierConfig);
						$this->strText = $objPurifier->purify($this->strText);
						break;
					// The use of the modes below is not recommended; they're there only for legacy
					// purposes. If you need to check for cross-site scripting violations, use QCrossScripting::Purify
					case QCrossScripting::Legacy:
					case QCrossScripting::Deny:
					default:
						// Deny the Use of CrossScripts
						// Check for cross scripting patterns
						$strText = strtolower($this->strText);
						if ((strpos($strText, '<script') !== false) ||
							(strpos($strText, '<applet') !== false) ||
							(strpos($strText, '<embed') !== false) ||
							(strpos($strText, '<style') !== false) ||
							(strpos($strText, '<link') !== false) ||
							(strpos($strText, '<body') !== false) ||
							(strpos($strText, '<iframe') !== false) ||
							(strpos($strText, 'javascript:') !== false) ||
							(strpos($strText, ' onfocus=') !== false) ||
							(strpos($strText, ' onblur=') !== false) ||
							(strpos($strText, ' onkeydown=') !== false) ||
							(strpos($strText, ' onkeyup=') !== false) ||
							(strpos($strText, ' onkeypress=') !== false) ||
							(strpos($strText, ' onmousedown=') !== false) ||
							(strpos($strText, ' onmouseup=') !== false) ||
							(strpos($strText, ' onmouseover=') !== false) ||
							(strpos($strText, ' onmouseout=') !== false) ||
							(strpos($strText, ' onmousemove=') !== false) ||
							(strpos($strText, ' onclick=') !== false) ||
							(strpos($strText, '<object') !== false) ||
							(strpos($strText, 'background:url') !== false))
							throw new QCrossScriptingException($this->strControlId);
				}
			}
		}

		public function GetAttributes($blnIncludeCustom = true, $blnIncludeAction = true) {
			$strToReturn = parent::GetAttributes($blnIncludeCustom, $blnIncludeAction);

			if ($this->blnReadOnly)
				$strToReturn .= 'readonly="readonly" ';
			
			if ($this->intMaxLength)
				$strToReturn .= sprintf('maxlength="%s" ', $this->intMaxLength);
			if ($this->strTextMode == QTextMode::MultiLine) {
				if ($this->intColumns)
					$strToReturn .= sprintf('cols="%s" ', $this->intColumns);			
				if ($this->intRows)
					$strToReturn .= sprintf('rows="%s" ', $this->intRows);
				if (!$this->blnWrap)
					$strToReturn .= 'wrap="off" ';
			} else {
				if ($this->intColumns)
					$strToReturn .= sprintf('size="%s" ', $this->intColumns);
			}
				
			return $strToReturn;
		}

		protected function GetControlHtml() {
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s"', $strStyle);

			switch ($this->strTextMode) {
				case QTextMode::MultiLine:
					$strToReturn = sprintf('<textarea name="%s" id="%s" %s%s>' . $this->strFormat . '</textarea>',
						$this->strControlId,
						$this->strControlId,
						$this->GetAttributes(),
						$strStyle,
						QApplication::HtmlEntities($this->strText));
					break;
				case QTextMode::Password:
					$strToReturn = sprintf('<input type="password" name="%s" id="%s" value="' . $this->strFormat . '" %s%s />',
						$this->strControlId,
						$this->strControlId,
						QApplication::HtmlEntities($this->strText),
						$this->GetAttributes(),
						$strStyle);
					break;
				case QTextMode::SingleLine:
				case QTextMode::Search:
				default:
					$typeStr = $this->strTextMode == QTextMode::Search ? 'search' : 'text';
					$strToReturn = sprintf('<input type="%s" name="%s" id="%s" value="' . $this->strFormat . '" %s%s />',
						$typeStr,
						$this->strControlId,
						$this->strControlId,
						QApplication::HtmlEntities($this->strText),
						$this->GetAttributes(),
						$strStyle);
			}

			return $strToReturn;
		}

		public function Validate() {
			$this->strValidationError = "";

			// Get the Text string
			if ($this->blnValidateTrimmed)
				$strText = trim($this->strText);
			else
				$strText = $this->strText;
			// Check for Required
			if ($this->blnRequired) {
				if (strlen($strText) == 0) {
					if ($this->strName)
						$this->strValidationError = sprintf($this->strLabelForRequired, $this->strName);
					else
						$this->strValidationError = $this->strLabelForRequiredUnnamed;
					return false;
				}
			}

			// Check against minimum length?
			if ($this->intMinLength > 0) {
				if (strlen($strText) < $this->intMinLength) {
					if ($this->strName)
						$this->strValidationError = sprintf($this->strLabelForTooShort, $this->strName, $this->intMinLength);
					else
						$this->strValidationError = sprintf($this->strLabelForTooShortUnnamed, $this->intMinLength);
					return false;
				}
			}

			// Check against maximum length?
			if ($this->intMaxLength > 0) {
				if (strlen($strText) > $this->intMaxLength) {
					if ($this->strName)
						$this->strValidationError = sprintf($this->strLabelForTooLong, $this->strName, $this->intMaxLength);
					else
						$this->strValidationError = sprintf($this->strLabelForTooLongUnnamed, $this->intMaxLength);
					return false;
				}
			}

			// If we're here, then everything is a-ok.  Return true.
			return true;
		}

		/**
		 * This will focus on and do a "select all" on the contents of the textbox
		 */
		public function Select() {
			QApplication::ExecuteJavaScript(sprintf('qc.getW("%s").select();', $this->strControlId));
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "Columns": return $this->intColumns;
				case "Format": return $this->strFormat;
				case "Text": return $this->strText;
				case "LabelForRequired": return $this->strLabelForRequired;
				case "LabelForRequiredUnnamed": return $this->strLabelForRequiredUnnamed;
				case "LabelForTooShort": return $this->strLabelForTooShort;
				case "LabelForTooShortUnnamed": return $this->strLabelForTooShortUnnamed;
				case "LabelForTooLong": return $this->strLabelForTooLong;
				case "LabelForTooLongUnnamed": return $this->strLabelForTooLongUnnamed;

				// BEHAVIOR
				case "CrossScripting": return $this->strCrossScripting;
				case "MaxLength": return $this->intMaxLength;
				case "MinLength": return $this->intMinLength;
				case "ReadOnly": return $this->blnReadOnly;
				case "Rows": return $this->intRows;
				case "TextMode": return $this->strTextMode;
				case "ValidateTrimmed": return $this->blnValidateTrimmed;

				// LAYOUT
				case "Wrap": return $this->blnWrap;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				// APPEARANCE
				case "Columns":
					try {
						$this->intColumns = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "Format":
					try {
						$this->strFormat = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "Text":
					try {
						$this->strText = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForRequired":
					try {
						$this->strLabelForRequired = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForRequiredUnnamed":
					try {
						$this->strLabelForRequiredUnnamed = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForTooShort":
					try {
						$this->strLabelForTooShort = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForTooShortUnnamed":
					try {
						$this->strLabelForTooShortUnnamed = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForTooLong":
					try {
						$this->strLabelForTooLong = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForTooLongUnnamed":
					try {
						$this->strLabelForTooLongUnnamed = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				// BEHAVIOR
				case "CrossScripting":
					try {
						$this->strCrossScripting = QType::Cast($mixValue, QType::String);
						// Protect from XSS to the best we can do with HTMLPurifier.
						if ($this->strCrossScripting == QCrossScripting::HTMLPurifier) {
							// If we are purifying using HTMLPurify, we will need the autoloader be included.
							// We load lazy to make sure that the library is not loaded every time 'prepend.inc.php'
							// or 'qcubed.inc.php' is inlcuded. HTMLPurifier is a HUGE and SLOW library. Lazy loading
							// keeps it simpler.
							require_once(__INCLUDES__ .'/external_libraries/htmlpurifier/library/HTMLPurifier.auto.php');

							// We configure the default set of forbidden tags (elements) and attributes here
							// so that the rules are applicable the moment CrossScripting is set to Purify.
							// Use the QTextBox::SetPurifierConfig method to override these settings.
							$this->objHTMLPurifierConfig = HTMLPurifier_Config::createDefault();
							$this->objHTMLPurifierConfig->set('HTML.ForbiddenElements', 'script,applet,embed,style,link,iframe,body,object');
							$this->objHTMLPurifierConfig->set('HTML.ForbiddenAttributes', '*@onfocus,*@onblur,*@onkeydown,*@onkeyup,*@onkeypress,*@onmousedown,*@onmouseup,*@onmouseover,*@onmouseout,*@onmousemove,*@onclick');
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "MaxLength":
					try {
						$this->intMaxLength = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "MinLength":
					try {
						$this->intMinLength = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "ReadOnly":
					try {
						$this->blnReadOnly = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "Rows":
					try {
						$this->intRows = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "TextMode":
					try {
						$this->strTextMode = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "ValidateTrimmed":
					try {
						$this->blnValidateTrimmed = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				// LAYOUT
				case "Wrap":
					try {
						$this->blnWrap = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}

	class QCrossScriptingException extends QCallerException {
		public function __construct($strControlId) {
			parent::__construct("Cross Scripting Violation: Potential cross script injection in Control \"" .
				$strControlId . "\"\r\nTo allow any input on this TextBox control, set CrossScripting to QCrossScripting::Allow. Also consider QCrossScripting::HTMLPurifier.", 2);
		}
	}
?>
