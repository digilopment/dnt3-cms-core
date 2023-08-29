<?php
get_top();
get_top_html();
?>

<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>

    function setLevelToMove(elementId) {
        var id = prompt("Prosím zadajte ID kategórie, kde chcete vybranú kategóriu presunúť", "");
        if (id != null) {
            window.location.replace('index.php?src=categories&action=moveTo&id=' + elementId + '&moveTo=' + id);
        }
    }
    function createCat(charIndex) {
        var name = prompt("Prosím zadajte názov kategórie", "");
        if (name != null) {
            window.location.replace('index.php?src=categories&action=addCat&charindex=' + charIndex + '&name=' + name);
        }
    }

    function setName(id, currentName) {
        var name = prompt("Prosím zadajte nový názov kategórie", currentName);
        if (name != null) {
            window.location.replace('index.php?src=categories&action=editName&id=' + id + '&name=' + name);
        }
    }
</script>

<div class="row content categories">
    <div class="col-md-12">
        <div class="grid no-border">
            <div class="grid-header">
                <i class="fa fa-file-o"></i>
                <h5><a href="">Typy položiek</a></h5>
                <a class="btn btn-primary" href="index.php?src=categories">Všetko</a>
                <?php foreach ($data['primaryCat'] as $key => $val) { ?>
                    <a class="btn btn-primary" href="index.php?src=categories&type=<?php echo $key; ?>"><?php echo $val; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="grid no-border">
            <span onclick="createCat('B-E')"title="Vytvoriť novú kategóriu" class="btn btn-primary"><i class="fa fa-plus"></i> Vložiť hlavnú kategóriu</span>
            <div class="grid-body"></div>
            <?php

            function htmlElement($element)
            {
                if (isset($_GET['catId']) && $_GET['catId'] == $element['id']) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                echo '<li data-id="' . $element['id'] . '" data-charindex="' . $element['char_index'] . '" class="snap ' . $selected . ' ' . $element['id'] . ' ui-sortable-handle">'
                . '<a href="index.php?src=categories&catId=' . $element['id'] . '"><span class="id"><i class="fa fa-folder" aria-hidden="true"></i>' . $element['id'] . '</span> - ' . $element['name'] . ' <span class="charindex">( ' . $element['char_index'] . ')</span></span></a>'
                . '<span class="buttons">'
                //. '<span title="Zobraziť obsah kategórie" class="btn btn-success"><i class="fa fa-folder-open-o"></i></span>'
                . '<span onclick="createCat(\'' . $element['char_index'] . '\') "title="Vytvoriť novú podkategoriu" class="btn btn-primary"><i class="fa fa-plus"></i></span>'
                . '<span onclick="setLevelToMove(' . $element['id'] . ')" title="Presuň do inej kategórie" class="btn btn-warning"><i class="fa fa-copy"></i></span>'
                . '<span onclick="setName(' . $element['id'] . ', \'' . $element['name'] . '\')" title="Premenovať" class="btn btn-warning"><i class="fa fa-edit"></i></span>'
                . '<a href="index.php?src=categories&action=moveUp&id=' . $element['id'] . '"><span title="Posunúť vyššie" class="btn btn-primary"><i class="fa fa-arrow-up"></i></span></a>'
                . '<a href="index.php?src=categories&action=moveDown&id=' . $element['id'] . '"><span title="Posunúť vyššie" class="btn btn-primary"><i class="fa fa-arrow-down"></i></span></a>'
                . '<a href="index.php?src=categories&action=removeCat&id=' . $element['id'] . '"><span title="Odstrániť kategóriu" class="btn btn-danger"><i class="fa fa-trash"></i></span></a>'
                . '</span>'
                . ''
                . '</li>';
            }

            function child($data, $parentId)
            {
                if ($data['hasChild']($parentId)) {
                    echo '<ul class="ui-sortable">';
                    foreach ($data['getChildren']($parentId) as $child) {
                        htmlElement($child);
                        child($data, $child['id']);
                    }
                    echo '</ul>';
                }
            }

            echo '<div class="tree" id="dropdiv">';
            echo '<ul class="ui-sortable">';
            foreach ($data['root_categories'] as $parent) {
                htmlElement($parent);
                child($data, $parent['id']);
            }
            echo '</ul>';
            echo '</div>';
            ?>



        </div>
    </div>
    <div class="col-md-6">
        <div class="grid no-border" id="dragdiv">
            <style id="compiled-css" type="text/css">

                .categories .search-form{
                    display:inline-block;float:right
                }
                .categories .search-form .search{
                    width: 200px;
                    border: 2px solid #428bca;
                    padding: 5px;
                }

                .categories .tree .btn{
                    width: 20px;
                    height: 25px;
                    margin: 3px;
                    border-radius: 4px
                }
                .categories .tree .btn i{
                    font-size: 11px;
                    display: block;
                    margin-left: -4px;
                }
                .categories .tree ul{
                    padding-left: 25px;
                    list-style: none;
                    cursor: pointer;
                }
                .categories .tree ul li.selected a{
                    color: #d30000;
                    font-size: 15px;
                }
                .categories .tree ul a {
                    cursor: pointer;
                    font-weight: bold;
                }
                .categories .tree ul .id,
                .categories .tree ul .charindex{
                    font-weight: normal;
                    font-size: 11px;
                    margin-left: 28px;
                }
                .categories .tree ul .id i{
                    font-size: 18px;
                    margin-right: 5px;
                }
                .categories .tree ul .charindex{
                    margin-left: 0px;
                    margin-right: 10px;
                }
                .categories .posts .post {
                    margin: 0px;
                    margin-bottom: 0px;
                    border-bottom: 1px dotted#ccc;
                    padding-bottom: 15px;
                    padding-top: 0px;

                }

                .categories .posts .post .item .btn{
                    font-size: 12px;
                }

                .categories .posts .dot{
                    height: auto;
                    background-color: #428bca;
                    border-radius: 2px;
                    color: #fff;
                    font-size: 17px;
                    padding: 3px;
                    display: block;
                    width: 25px;
                    margin-top: 0px;
                    margin-left: 10px;
                    cursor: move;
                }

                .categories .included + .post,
                .categories .updated + .post{
                    opacity:0.9!important;
                }
                .categories .included.dropped + .post{
                    /*display:none;*/
                }
                .categories .posts .post-move.dot.updated{
                    background-color: #f0ad4e;
                }
                .categories .drop-aera .text{
                    display: block;
                    width: 100%;
                    padding: 15px;
                    border: 10px dashed#efefef;
                    border-radius: 10px;
                    text-align: center;
                    font-size: 30px;
                    color: #428bca;
                    font-weight: bold;
                }
                .categories .drop-aera{
                    padding: 10px;
                }
            </style>

            <script>
                const customConsole = (w) => {
                    const pushToConsole = (payload, type) => {
                        w.parent.postMessage({
                            console: {
                                payload: payload,
                                type: type
                            }
                        }, "*")
                    }

                    w.onerror = (message, url, line, column) => {
                        // the line needs to correspond with the editor panel
                        // unfortunately this number needs to be altered every time this view is changed
                        line = line - 79

                        if (line < 0) {
                            pushToConsole(message, "error")
                        } else {
                            pushToConsole(`[${line}:${column}] ${message}`, "error")
                        }
                    }

                    w.console = (function () {
                        return {
                            log: (payload) => {
                                pushToConsole(payload, "log")
                            },
                            info: (payload) => {
                                pushToConsole(payload, "info")
                            },
                            warn: (payload) => {
                                pushToConsole(payload, "warn")
                            },
                            error: (payload) => {
                                pushToConsole(payload, "error")
                            },
                            system: (payload) => {
                                pushToConsole(payload, "system")
                            }
                        }
                    }())

                    console.system("Running fiddle")
                }

                if (window.parent) {
                    customConsole(window)
                }
            </script>


            <span id="saveCat" class="btn btn-primary">Uložiť zmeny</span>
            <form class="search-form" action="index.php?src=categories">
                <i class="fa fa-search"></i><input type="hidden" value="categories"name="src" >
                <input class="formc-ontrol search" type="text" value="" autocomplete="off" name="search" placeholder="Hľadaj">
            </form>
            <div class="posts" id="comparison" >

                <div class="drop-aera">
                    <div class="text">
                        Ak chcete príspevok vrátiť, presuňteho sem
                    </div>
                </div>
                <?php
                foreach ($data['dnt']->orderby($data['getPosts'], 'post_category_id', 'ASC') as $post) {
                    ?>
                    <div class="row no-padding no-margin">
                        <div data-id="<?php echo $post->id_entity ?>" title='<?php echo $post->name . ' => ';
                        echo $post->post_category_id ? 'Presunutím na príslušnú kategóriu zmeníte kategóriu produktu' : 'Presunutím na príslušnú kategóriu, produkt vložíte do kategórie';
                        ?>'class="dot post-move <?php echo $post->post_category_id ? 'updated' : false ?> col-md-2"><i class="fa fa-arrows"></i></div>
                        <div class="col-xs-10 post <?php echo $post->post_category_id ? 'updated' : false ?> no-padding">
                            <div class="item">
                                <div class="col-xs-2 col-md-2 ">
                                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew">
                                </div>
                                <div class="col-xs-4 col-md-7">
                                    <h4 class="product-name"><strong><?php echo $post->name ?></strong></h4>
                                    <?php if ($post->post_category_id) { ?>
                                    <h4>Kategória: <small><?php echo $data['getElement']($post->post_category_id)['name'] . ' (' . $post->post_category_id . ')' ?> </small></h4>
                                    <?php } ?>
                                </div>
                                <div class="col-md-3 row">
                                    
                                    <a target="_blank" class="btn btn-primary bg-blue" href="index.php?src=content&filter=308&sub_cat_id=&post_id=<?php echo $post->id_entity ?>&page=1&action=edit&included=sitemap"><i class="fa fa-pencil bg-blue"></i> Editovať</a>
                                    <?php if ($post->service) { ?>
                                        <a target="_blank" class="btn btn-danger bg-orange" href="?src=services&included=sitemap&filter=308&post_id=<?php echo $post->id_entity ?>&service=<?php echo $post->service ?>"><i class="fa fa-pencil"></i> Upraviť meta parametre</a>
                                    <?php } ?>
                                    <?php if ($post->post_category_id) { ?>
                                        <a class="btn btn-danger bg-red" href="index.php?src=categories&post_id=<?php echo $post->id_entity ?>&action=removePostCat"><i class="fa fa-trash bg-red"></i> Odstrániť z kategórie</a>
                                    <?php } ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <!-- TODO: Missing CoffeeScript 2 -->

        <script type="text/javascript">//<![CDATA[
            var beh = new Array();
            var beh2 = "";
            var MyVar = "";

            $(".post-move").draggable({
                cursor: 'move',
                snap: '.snap',
                revert: function (event, ui) {

                    $(this).data("ui-draggable").originalPosition = {
                        top: 0,
                        left: 0
                    };

                    return !event;

                },
                drag: function (event, ui) {
                    if ($(this).data('droppedin')) {
                        $(this).data('droppedin').droppable('enable');
                        $(this).data('droppedin', null);
                        $(this).removeClass('dropped');
                        MyVar = $(this).attr('data-dropped-Id');
                        //alert(MyVar);
                        beh[MyVar] = "";
                        $(this).removeAttr('data-dropped-Id');
                        $(this).removeClass('included');

                        //alert(beh);

                    }
                }
            });
            $(".snap").droppable({
                hoverClass: 'hovered',
                tolerance: 'pointer',
                drop: function (event, ui) {
                    var drop_p = $(this).offset();
                    var drag_p = ui.draggable.offset();
                    var left_end = drop_p.left - drag_p.left;
                    var top_end = drop_p.top - drag_p.top;
                    ui.draggable.animate({
                        top: '+=' + top_end,
                        left: '+=' + left_end
                    });
                    ui.draggable.addClass('dropped');

                    ui.draggable.data('droppedin', $(this));
                    //$(this).droppable('disable');

                }
            });


            $(".snap").on("drop", function (event, ui) {
                MyVar = event.target.getAttribute('data-id');
                beh[MyVar] = ui.draggable.attr('data-id');
                ui.draggable.attr('data-dropped-Id', $(this).attr('data-id'));
                ui.draggable.addClass('included');
                //alert(beh[MyVar] + " " + MyVar);

            });
            //]]></script>
        <script>
            $(document).ready(function () {
                $("#saveCat").click(function () {
                    $('.categories .col-md-6').css('opacity', '0.2');

                    var data = [];
                    $('.post-move.included').each(function () {
                        var postId = $(this).attr('data-id');
                        var catId = $(this).attr('data-dropped-id');
                        $.ajax({
                            type: 'POST',
                            url: 'index.php?src=categories&action=savePostsToCat',
                            data: postId + '=' + catId,
                            //success: success,
                            dataType: 'json'
                        });
                    });
                    setTimeout(function () {
                        $('.categories .col-md-6').fadeOut();
                        window.location.href = "";
                    }, 2000);
                });
            });
        </script>
    </div>
</div>



<?php
get_bottom_html();
get_bottom();
?>