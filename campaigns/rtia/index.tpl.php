<html>
<body>
<?php include __INCLUDES__."/header.inc.php"; ?>
<?php $this->RenderBegin(); ?>
<div class="row-fluid">
    <div class="span9 offset2">
        <div class="form-search">
            <?php $this->lstOption->Render(); ?>
            <?php $this->txtSearch->Render(); ?>
            <?php $this->btnGo->Render(); ?><br /><br />
            <?php $this->lblStatecode->Render(); ?>
        </div>
    </div>
</div>
<div class="row-fluid">
    <?php $this->lblArea->Render(); ?>
</div>
<?php $this->RenderEnd(); ?>
<?php include __INCLUDES__."/footer.inc.php"; ?>