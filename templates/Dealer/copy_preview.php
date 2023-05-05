<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 * @var string[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $productSubCategories
 * @var string[]|\Cake\Collection\CollectionInterface $uoms
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<section id="content">
    <!-- <div class="container clearfix">
        <div class="row my-3">
            <div class="col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget widget_links clearfix">
                            <h4>Top Categories</h4>
                            <ul>
                                <li><a href="#">Junction Box</a></li>
                                <li><a href="#">Bezel</a></li>
                                <li><a href="#">Compressor</a></li>
                                <li><a href="#">Facia</a></li>
                                <li><a href="#">Frame</a></li>
                                <li><a href="#">Hinge</a></li>
                                <li><a href="#">WIP Forging Machined</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <br>
                    <!-- <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/1.png" style="width: 15vw;"></a>
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/5.png" style="width: 15vw;"></a>
                        <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/regionalsearch/">
                            <div><i class="icon-wpforms"></i>Regional Suppliers</div></a> -->
            </div>
            <div class="col-lg-12">
                <h3>Request for Quotation</h3>
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create($rfqDetail) ?>
                <div class="card">
                    <div class="card-body" id="mulform">
                        <?php 
                        $cnt = 0;
                        foreach($rfqDetail as $key => $rfq) :
                            $cnt++;?>
                        <div class="row" id="RFQ<?=$key?>">
                            <div class="col-12">
                                <h5><b>PRODUCT <?= ($key+1)?> <div style="outline-style: solid;"></div></b></h5>
                            </div>
                            <div class="col-4">
                            <?= $this->Form->control($key.'.product_id', array('value' => $rfq->product_id, 'required' => true, 'type' => 'select','options' => $products,'empty' => 'Select',  'class' => 'form-control product', 'label' => 'Category', 'data-id' => '0')); ?>
                            </div>
                            <div class="col-4" id="0-others" style="display: none;"></div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.product_sub_category_id', array('value' => $rfq->product_sub_category_id, 'required' => true, 'type' => 'text','options' => array(), 'empty' => 'Select', 'id' => 'product_sub_category_id', 'class' => 'form-control','label' => 'Sub Category')); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.part_name', ['value' => $rfq->part_name, 'label' => 'Part', 'required' => true, 'class' => 'form-control','maxlength' => 100]); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.qty', ['value' => $rfq->qty, 'label' => 'Qty', 'required' => true, 'class' => 'form-control', 'type' => 'number' ]); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.uom_code', array('value' => $rfq->uom_code, 'label' => 'UOM', 'required' => true, 'class' => 'form-control','type' => 'select','options' => $uoms,'empty' => 'Select', 'id' => 'uom', 'label' =>'UOM')); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.make', ['value' => $rfq->make, 'label' => 'Make', 'required' => true, 'maxlength' => 100, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control($key.'.remarks', ['value' => $rfq->remarks, 'label' => 'Remark', 'type' => 'textarea', 'required' => true, 'escape' => false, 'rows' => '1', 'cols' => '5', 'maxlength' => 200, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer">
                    <button label="Login" class="button button-rounded button-reveal button-large button-red text-end bin"
                            type="button" onclick="deleteform()" style="display:none;">
                            <i class="icon-line2-trash"></i>
                            <span>DELETE</span>
                        </button>
                        <button label="Login" class="button button-rounded button-reveal button-large button-purple"
                            type="button" onclick="addform()">
                            <i class="icon-line-plus"></i>
                            <span>ADD</span>
                        </button>
                        <button label="Login"
                            class="button button-rounded button-reveal button-large button-yellow button-light text-end"
                            type="submit" style="float:right;">
                            <i class="icon-line-save"></i>
                            <span>SAVE RFQ</span>
                        </button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<script>
    
    
    var form_ID = [<?=$cnt-1?>];
    var category = [<?php foreach($products as $prd): ?> '<?= h($prd) ?>',<?php endforeach; ?>]

    function addform() {
        var id = form_ID[form_ID.length - 1] + 1;
        addrow(id);
        form_ID.push(id);
        category_datalist(id);
        if (form_ID.length > 1){$(".bin").show();}
    }

    function deleteform(){
        var id = form_ID[form_ID.length - 1];
        form_ID.pop(id);
        $("#RFQ" + id).remove();
        if (form_ID.length < 2){$(".bin").hide();}
    }

    function addrow(id) {
        $("#mulform").prepend(`<div class="row" id="RFQ` + (id) + `">
                            <div class="col-12">
                            <br><h5><b>PRODUCT `+ (id + 1) + ` <div style="outline-style: solid;"></div></b></h5>
                            </div>
                            <div class="col-4">
                                <label for="`+ id + `-product">Product :</label>
                                <select name="`+ id + `[product_id]" required="required" class="form-control product" data-id="`+ id + `" id="`+ id + `-product-id">
                                <option value="">Select</option>
                                <option value="1196">ABS</option>
                                <option value="1197">ADVERSETISEMENT HOLDER</option>
                                <option value="1198">ALTERNATOR</option>
                                <option value="1199">DROP ARM</option>
                                <option value="1200">ANCHORAGE</option>
                                <option value="1201">ALUMINIUM &amp; ITS RELATED PARTS</option>
                                <option value="1202">AIR CLEANER</option>
                                <option value="1203">AIR TANK</option>
                                <option value="1204">AXLE (FR RR)</option>
                                <option value="1205">HV BATTERY PACK</option>
                                <option value="1206">BUS BAR</option>
                                <option value="1207">BLOCK</option>
                                <option value="1208">AIR BELLOW</option>
                                <option value="1209">BUZZER</option>
                                <option value="1210">BEARING</option>
                                <option value="1211">BALL JOINTS</option>
                                <option value="1212">BRACKET</option>
                                <option value="1213">BELT</option>
                                <option value="1214">BEAM</option>
                                <option value="1215">RUBBER BEADINGS</option>
                                <option value="1216">BOX</option>
                                <option value="1217">AIR DRYER</option>
                                <option value="1218">BRUSH</option>
                                <option value="1219">BACKREST</option>
                                <option value="1220">HOOD</option>
                                <option value="1221">BUMPER (FR, RR)</option>
                                <option value="1222">BEZEL</option>
                                <option value="1223">JUNCTION BOX</option>
                                <option value="1224">ADHESIVE</option>
                                <option value="1225">CIRCUIT DIAGRAM</option>
                                <option value="1226">TRACTION CONTAINER</option>
                                <option value="1227">COVER, MOUNTING ABS VALVES COVER</option>
                                <option value="1228">USB CHARGER</option>
                                <option value="1229">CLUTCH PLATE</option>
                                <option value="1230">COIL IGNITION</option>
                                <option value="1231">CLAMPS</option>
                                <option value="1232">COMPRESSOR</option>
                                <option value="1233">CONNECTORS</option>
                                <option value="1234">CONTROLLER</option>
                                <option value="1235">COUPLING</option>
                                <option value="1236">CYLINDER</option>
                                <option value="1237">COLLARS</option>
                                <option value="1238">DRIVER CURTAIN</option>
                                <option value="1239">Cooling System</option>
                                <option value="1240">CASTING</option>
                                <option value="1241">DASHBOARD</option>
                                <option value="1242">DIMISTER</option>
                                <option value="1243">DOME</option>
                                <option value="1244">Floor Drainage</option>
                                <option value="1245">PIN (HORN PIN)</option>
                                <option value="1246">DOOR</option>
                                <option value="1247">DIP STICK</option>
                                <option value="1248">DISPLAY UNIT</option>
                                <option value="1249">ELECTRICAL BASE</option>
                                <option value="1250">ELECTROSTATIC DISCHARGE GASKET</option>
                                <option value="1251">ELECTRICAL ANTENNA</option>
                                <option value="1252">ENGINE</option>
                                <option value="1253">ELECTRICAL MDVR</option>
                                <option value="1254">EXTRUDED SECTIONS</option>
                                <option value="1255">INLET &amp; EXHAUST MANIFOLD</option>
                                <option value="1256">FITTINGS</option>
                                <option value="1257">FACIA</option>
                                <option value="1258">FIRE DETECTION SYSTEM</option>
                                <option value="1259">FRAME</option>
                                <option value="1260">FIXTURE</option>
                                <option value="1261">FLANGE</option>
                                <option value="1262">CHASSIS FRAME ASSY</option>
                                <option value="1263">FAN (EE)</option>
                                <option value="1264">FRP</option>
                                <option value="1265">FUEL SYSTEM</option>
                                <option value="1266">FOOTSTEP</option>
                                <option value="1267">FUSE</option>
                                <option value="1268">FORGING</option>
                                <option value="1269">BOLT - ON ASSEMBLY</option>
                                <option value="1270">GEAR BOX - TRANSMISSION</option>
                                <option value="1271">GANCIO</option>
                                <option value="1272">GRID - TRAY</option>
                                <option value="1273">MESH</option>
                                <option value="1274">GUSSET</option>
                                <option value="1275">GLASS - SIDE GLASS, FR WINDSCREEN, RR WINDSCREEN</option>
                                <option value="1276">HOMOLOGATION CERTIFICATE</option>
                                <option value="1277">HANDHOLD</option>
                                <option value="1278">HINGE</option>
                                <option value="1279">HARDDISK</option>
                                <option value="1281">HPL</option>
                                <option value="1282">ELECTRICAL HORN</option>
                                <option value="1283">HOUSING</option>
                                <option value="1284">HATCH</option>
                                <option value="1285">HUB</option>
                                <option value="1286">HVAC</option>
                                <option value="1287">HARDWARE</option>
                                <option value="1288">HYDRAULIC SYSTEM</option>
                                <option value="1289">INSTRUMENT CLUSTER</option>
                                <option value="1290">INSULATION</option>
                                <option value="1291">INVERTER</option>
                                <option value="1292">JACK</option>
                                <option value="1293">KINGPIN</option>
                                <option value="1294">KIT</option>
                                <option value="1295">LAMP ASSY</option>
                                <option value="1296">LID</option>
                                <option value="1297">LATCHES</option>
                                <option value="1298">LINNER</option>
                                <option value="1299">LAMP</option>
                                <option value="1300">VALIDATOR MACHINE</option>
                                <option value="1301">MACHINED COMPO</option>
                                <option value="1302">MEDICAL KIT</option>
                                <option value="1303">MUDGUARD</option>
                            </select>
                            </div>
                            <div class="col-4" id="`+ id + `-others" style="display: none;"></div>
                            <div class="col-4">
                                <div class="input text required"><label for="`+ id + `-product_sub_category_id">Sub Category</label><input type="text" name="` + id + `[product_sub_category_id]" required="required" options="" empty="Select" id="product_sub_category_id" class="form-control" aria-required="true"></div></div>
                            <div class="col-4">
                                <div class="input text required"><label for="`+ id + `-part-name">Part Name</label><input type="text" name="` + id + `[part_name]" required="required" class="form-control" maxlength="1` + id + `` + id + `" id="` + id + `-part-name" aria-required="true"></div>                            </div>
                            <div class="col-4">
                                <div class="input number required"><label for="`+ id + `-qty">Qty</label><input type="number" name="` + id + `[qty]" required="required" class="form-control" id="` + id + `-qty" aria-required="true"></div>                            </div>
                            <div class="col-4">
                                <div class="input select required"><label for="uom">UOM</label><select name="`+ id + `[uom_code]" required="required" class="form-control" id="uom"><option value="">Select</option><option value="1">BAGS</option><option value="2">BALE</option><option value="3">BUNDLES</option><option value="4">BUCKLES</option><option value="5">BILLION OF UNITS</option><option value="6">BOX</option><option value="7">BOTTLES</option><option value="8">BUNCHES</option><option value="9">CANS</option><option value="1` + id + `">CUBIC CENTIMETERS</option><option value="11">CENTIMETERS&nbsp;</option><option value="12">CUBIC METERS</option><option value="13">CARTONS</option><option value="14">DOZENS&nbsp;</option><option value="15">DRUMS</option><option value="16">GREAT GROSS</option><option value="17">GRAMMES</option><option value="18">GROSS</option><option value="19">GROSS YARDS</option><option value="2` + id + `">KILOGRAMS</option><option value="21">KILOLITRE</option><option value="22">KILOMETRE</option><option value="23">LITRES</option><option value="24">MILLI LITRES</option><option value="25">MILILITRE</option><option value="26">METERS</option><option value="27">METRIC TON</option><option value="28">NUMBERS</option><option value="29">OTHERS</option><option value="3` + id + `">PACKS</option><option value="31">PIECES</option><option value="32">PAIRS</option><option value="33">QUINTAL</option><option value="34">ROLLS</option><option value="35">SETS</option><option value="36">SQUARE FEET</option><option value="37">SQUARE METERS</option><option value="38">SQUARE YARDS</option><option value="39">TABLETS</option><option value="4` + id + `">TEN GROSS</option><option value="41">THOUSANDS</option><option value="42">TONNES</option><option value="43">TUBES</option><option value="44">US GALLONS</option><option value="45">UNITS</option><option value="46">YARDS</option></select></div>                            </div>
                            <div class="col-4">
                                <div class="input text required"><label for="`+ id + `-make">Make</label><input type="text" name="` + id + `[make]" required="required" class="form-control" maxlength="1` + id + `` + id + `" id="` + id + `-make" aria-required="true"></div>                            </div>
                            <div class="col-4">
                                <div class="input textarea required"><label for="`+ id + `-remarks">Remarks</label><textarea name="` + id + `[remarks]" class="form-control" required="required" rows="1" cols="5" maxlength="2` + id + `` + id + `" id="` + id + `-remarks" aria-required="true"></textarea></div>                            </div>
                            <div class="col-4">
                                <label>Attachment</label>
                                <div class="input file"><input type="file" name="`+ id + `.[files][]" class="form-control" multiple="multiple" id="` + id + `-files"></div></div></div>
                        `);
    };

    function category_datalist(id) {
        $("#" + id + "-product-id").append(`<option value="0">Others</option>`);
    }
    category_datalist(0)
    $(document).on("change", ".product", function () {
        var value = $(this).val();
        var id = $(this).data('id');
        getSupplierList(id, value)
        if (value == "0") {
            $("#" + id + "-others").prepend(`<div class="input text required" id="`+id+`_others_container"><label for="` + id + `-other">Name Category</label><input type="text" name="` + id + `[other]" required="required" options="" empty="Select" id="`+ id +`_other_id" class="form-control" aria-required="true"></div>`).show();
        } else { $("#" + id + "-others").html('');
        }
    });


    function getSupplierList(id, category) {
        $.ajax({
          type: "GET",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'api/api', 'action' => 'get-vendor-by-category')); ?>/" +category,
          data: $("#notifyForm").serialize(),
          dataType: 'json',
          success: function (response) {
            console.log(response);
            
            $("#" + id + "-seller").html('');
            $("#" + id + "-seller").html('<option value="">Please Select</option>');
            for(var i = 0; i < response.length; i++) {
                $("#" + id + "-seller").append('<option value="'+response[i].key+'">'+response[i].value+'</option>');
            }
          }
        });
    }

</script>