

<div class="content">
    <div class="block user-list">
        <ol>
            <li class="list-header">
                <h1>ADMIN DASHBOARD</h1>
            </li>
            <?php foreach($users as $user): ?><li>

                <p><?php echo $user->getUserId(); ?></p>
                <p><?php echo $user->getUserName(); ?></p>
                <p><?php echo $user->getUserRole(); ?></p>

                <span class="pull-right">
                <div>
                    <input <?php echo ($user->getUserRole()=='subscriber')?'checked':'' ?> type = "radio" name = "<?php echo $user->getUserId(); ?>" id = "subscriber" value = "subscriber" />
                    <label for = "subscriber">Subscriber</label>
                </div>
                <div>
                    <input <?php echo ($user->getUserRole()=='writer')?'checked':'' ?> type = "radio" name = "<?php echo $user->getUserId(); ?>" id = "writer" value = "writer" />
                    <label for = "writer">Writer</label>
                </div>
                <div>
                    <input <?php echo ($user->getUserRole()=='editor')?'checked':'' ?> type = "radio" name = "<?php echo $user->getUserId(); ?>" id = "editor" value = "editor" />
                    <label for = "editor">Editor</label>
                </div>
                <div>
                    <input <?php echo ($user->getUserRole()=='publisher')?'checked':'' ?> type = "radio" name = "<?php echo $user->getUserId(); ?>" id = "publisher" value = "publisher" />
                    <label for = "publisher">Publisher</label>
                </div>



                    <button>Delete</button>
                </span>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>