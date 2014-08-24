<aside id="sidebar-home" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <div class="sidebar">
        <header>
            <h3>Sidebar Title</h3>
        </header>
        <main>
            <ul class="list-group">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<li class=\"list-group-item\"><a href=\"#\">List item</a> <span class='badge'>{$i}</span> </li>";
                }
                ?>
            </ul>
        </main>
    </div>
</aside>
<div class="clearfix"></div>