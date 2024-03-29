<?php use Phalcon\Tag as Tag ?>

<?php echo Tag::form(array("products/create", "autocomplete" => "off")) ?>

<ul class="pager">
    <li class="previous pull-left">
        <?php echo Tag::linkTo(array("products", "&larr; Go Back")) ?>
    </li>
    <li class="pull-right">
        <?php echo Tag::submitButton(array("Save", "class" => "btn btn-success")) ?>
    </li>
</ul>

<?php echo $this->getContent() ?>

<div class="center scaffold">
    <h2>Create products</h2>

    <div class="clearfix">
        <label for="product_types_id">播出時間</label>
        <?php echo Tag::select(array("product_types_id", $productTypes, "using" => array("id", "name"), "useDummy" => true)) ?>
    </div>

    <div class="clearfix">
        <label for="name">番名</label>
        <?php echo Tag::textField(array("name", "size" => 24, "maxlength" => 70)) ?>
    </div>

    <div class="clearfix">
        <label for="price">集數</label>
        <?php echo Tag::textField(array("price", "size" => 24, "maxlength" => 70, "type" => "number")) ?>
    </div>

    <div class="clearfix">
        <label for="active">正在播</label>
        <?php echo Tag::selectStatic(array("active", array('Y'=>'Y','N'=>'N',), "useDummy" => true)) ?>
    </div>

</div>
</form>
