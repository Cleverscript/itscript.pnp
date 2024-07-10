<div class="pnp-cmp-over">
    <div class="pnp-form-fields">
        <p>
            <button id="addShared-btn-js" type="button">AddShared</button>
            <button id="addQueue-btn-js" type="button">AddQueue</button>
            <button id="addBuyUser-btn-js" type="button">AddByUser</button>
        </p>
        <p>
        <textarea name="PNP_PARAMS" id="pnp-params-js">{
            "tag": '9d3f84f3774b06d0f5923ee3d4c5c63d',
            "active": 'Y',
            "id": 54434,
            "value": 90,
            'status': 4
        }</textarea>
        </p>
    </div>

    <br/>

    <div class="result-cont">
        <div id="result-js" class="result-cont-inner"></div>
    </div>
</div>

<!-- DON TOUCH !!! -->
<?php
$jsParams = $arParams;
?>

<script>
var jsparams = <?=CUtil::PhpToJSObject($jsParams, false, true)?>;
</script>

<?php
/*echo '<pre>';
print_r($arResult);
print_r($arParams);
echo '</pre>';*/