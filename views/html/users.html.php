

<div class="content">
    <div class="block user-list">
        <ol>
            <li class="list-header">
                <h1>ADMIN DASHBOARD</h1>

            </li>
            <?php foreach((array)$users as $user): ?><li>

                <p><?php echo $user->getUserId(); ?></p>
                <p><?php echo $user->getUserName(); ?></p>
                <p><?php echo $user->getUserRole(); ?></p>

                <form class="pull-right" action="?page=admin&action=delete_user" method="post">
                    <input type='hidden' name='action' value='delete' />
                    <input type='hidden' name='user_id' value='<?php echo $user->getUserId(); ?>' />
                    <button onclick="this.form.submit(); return false;">Delete user</button>
                </form>

                <form class="pull-right" action="?page=admin&action=change_role" method="post">
                    <input type='hidden' name='user_id' value='<?php echo $user->getUserId(); ?>' />
                    <select onchange="this.form.submit();" name="user_role">
                        <option <?php echo ($user->getUserRole()=='subscriber')?'selected':'' ?> value="subscriber" name='subscriber'>Subscriber</option>
                        <option <?php echo ($user->getUserRole()=='writer')?'selected':'' ?> value="writer" name='writer'>Writer</option>
                        <option <?php echo ($user->getUserRole()=='editor')?'selected':'' ?> value="editor" name='editor'>Editor</option>
                        <option <?php echo ($user->getUserRole()=='publisher')?'selected':'' ?> value="publisher" name='publisher'>Publisher</option>
                    </select>
                </form>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>