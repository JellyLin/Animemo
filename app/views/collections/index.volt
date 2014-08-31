<?php use Phalcon\Tag as Tag ?>

<?php echo $this->getContent() ?>

<div align="right">
    <?php echo Tag::linkTo(array("products/new", "Create Products", "class" => "btn btn-primary")) ?>
</div>


<div>
    <h2>動畫</h2>
    <p> counts : <?php echo $animeCounts ?></p>
    <img src='/animemo/public/img/0001053829.JPG'></img>

    <?php echo Tag::form(array("collections/search", "autocomplete" => "off")) ?>

    <div class="clearfix">
        <label for="name">Name</label>
        <?php echo Tag::select(array("name", $animeNames, "using" => array("name", "name"), "useDummy" => true)) ?>
    </div>

    <div class="clearfix">
        <label for="product_types_id">種類</label>
        <?php echo Tag::select(array("product_types_id", array(16 => "動畫"), "useDummy" => true)) ?>
    </div>

    <div class="clearfix">
        <?php echo Tag::submitButton(array("Search", "class" => "btn btn-primary")) ?></td>
    </div>
</div>

</form>
