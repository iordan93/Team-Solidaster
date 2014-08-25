<aside id="sidebar-home" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <div class="sidebar">
        <header>
            <h3>Sidebar Title</h3>
        </header>
        <main>
            <ul class="list-group">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<li class=\"list-group-item\"><span class='badge'>{$i}</span><a href=\"#\">List item</a></li>";
                }
                ?>
            </ul>
        </main>
    </div>
</aside>
<div class="clearfix"></div>