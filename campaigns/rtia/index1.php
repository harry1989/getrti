<?php
include("assets/qcubed.inc.php");

class Index extends QForm{

    protected $txtSearch;
    protected $btnGo;
    protected $lstOption;
    protected $optnSelected;
    protected $lblStatecode;
    protected $lblArea;

    protected function Form_Create(){
        $this->optnSelected = 1;
        $this->txtSearch = new QAjaxAutoCompleteTextBox($this, 'txtServerSide_Change');
        $this->txtSearch->CssClass = "input-medium search-query span6";
        $this->txtSearch->Placeholder = "Start typing your constituency...";
        $this->btnGo = new QButton($this);
        $this->btnGo->Text = "Go";
        $this->btnGo->CssClass = "btn btn-primary";
        $this->btnGo->AddAction(new QClickEvent(), new QServerAction('display_data'));
        $this->lstOption = new QListBox($this);
        $this->lstOption->AddItem("Lok Sabha", "1");
        $this->lstOption->AddItem("Rajya Sabha", "2");
        $this->lstOption->AddAction(new QChangeEvent(), new QAjaxAction('placeholder_change'));
        $this->lblStatecode = new QLabel($this);
        $this->lblStatecode->Visible = false;
        $this->lblStatecode->HtmlEntities = false;
        $this->lblStatecode->Text = "<span class='span5'></span> <a href='http://en.wikipedia.org/wiki/List_of_Indian_States_and_Union_Territories_by_two-letter_codes' target='_blank'>List of state codes</a>";
        $this->lblArea = new QLabel($this);
        $this->lblArea->Visible = false;
        $this->lblArea->HtmlEntities = false;
    }
    public function txtServerSide_change($strParameter){
        if($this->optnSelected == 1){
            $objMemberArray = Loksabha::QueryArray(
                QQ::OrCondition(
                    QQ::Like(QQN::Loksabha()->Constituency, $strParameter . '%')
                ),
                QQ::Clause(QQ::OrderBy(QQN::Loksabha()->Constituency))
            );
            $result = array();
            foreach($objMemberArray as $objMember){
                $result[] = $objMember->Constituency;
            }
            return $result;
        }
    }

    protected function placeholder_change($strFormId, $strControlId, $strParameter){
        if($this->lstOption->SelectedValue == 1){
            $this->txtSearch->Placeholder = "Start typing your constituency...";
            $this->optnSelected = 1;
            $this->lblStatecode->Visible = false;
        }
        elseif($this->lstOption->SelectedValue == 2){
            $this->txtSearch->Placeholder = "Enter your state code";
            $this->optnSelected = 2;
            $this->lblStatecode->Visible = true;
        }
    }

    protected function display_data($strFormId, $strControlId, $strParameter){
        $this->lblArea->Text = "<div class='span7 offset2 main-area'>";
        if($this->optnSelected == 1){
            $mpArrayCount = Loksabha::CountByConstituency($this->txtSearch->Text);
            if($mpArrayCount==0){
                $this->lblArea->Text.="<h4>No Records Found</h4>";
                $this->lblArea->Text.="</div>";
            }
            else{
                $mpArray = Loksabha::LoadArrayByConstituency($this->txtSearch->Text);
                foreach($mpArray as $mp){
                    $this->lblArea->Text.="<p>";
                    $this->lblArea->Text.="<h4>".$mp->Name."</h4><br />";
                    $this->lblArea->Text.="<strong>Date of birth: </strong>".$mp->Dob."<br />";
                    $this->lblArea->Text.="<strong>Party: </strong>".$mp->Party."<br />";
                    $this->lblArea->Text.="<strong>Constituency: </strong>".$mp->Constituency."<br />";
                    $this->lblArea->Text.="<strong>State: </strong>".$mp->State."<br />";
                    $this->lblArea->Text.="<strong>Permanent Address: </strong>".$mp->PAddress."<br />";
                    $this->lblArea->Text.="<strong>Permanent Telephone No.: </strong>".$mp->PTelephone."<br />";
                    $this->lblArea->Text.="<strong>Local Address: </strong>".$mp->DAddress."<br />";
                    $this->lblArea->Text.="<strong>Local Telephone: </strong>".$mp->DTelephone."<br />";
                    $this->lblArea->Text.="<strong>E-Mail: </strong>".$mp->Email."<br /></p>";
                    $this->lblArea->Text.="<small><em>getRTI is not responsible for authenticity of information provided.</em></small>";
                    $this->lblArea->Text.="</div>";
                }
            }
        }
        if($this->optnSelected == 2){
            $mpArrayCount = Rajyasabha::CountByState($this->txtSearch->Text);
            if($mpArrayCount==0){
                $this->lblArea->Text.="<h4>No Records Found</h4>";
                $this->lblArea->Text.="</div>";
            }
            else{
                $mpArray = Rajyasabha::LoadArrayByState($this->txtSearch->Text);
                foreach($mpArray as $mp){
                    $this->lblArea->Text.="<p>";
                    $this->lblArea->Text.="<br /><h4>".$mp->Name."</h4><br />";
                    $this->lblArea->Text.="<strong>Local Address: </strong>".$mp->DAddress."<br />";
                    $this->lblArea->Text.="<strong>Local Telephone: </strong>".$mp->DTelephone."<br />";
                    $this->lblArea->Text.="<strong>Permanent Address: </strong>".$mp->PAddress."<br />";
                    $this->lblArea->Text.="<strong>Permanent Telephone: </strong>".$mp->PTelephone."<br />";
                    $this->lblArea->Text.="<strong>Date of birth: </strong>".$mp->Dob."<br />";
                    $this->lblArea->Text.="<strong>Party: </strong>".$mp->Party."<br />";
                    $this->lblArea->Text.="<strong>State: </strong>".$mp->State."<br />";
                    $this->lblArea->Text.="<strong>E-Mail: </strong>".$mp->Email."<br />";
                    $this->lblArea->Text.="<small><em>getRTI is not responsible for authenticity of information provided.</em></small>";
                    $this->lblArea->Text.="</p>";
                }
                $this->lblArea->Text.="</div>";
            }
        }
        $this->lblArea->Visible = true;
    }
}
Index::Run('Index');