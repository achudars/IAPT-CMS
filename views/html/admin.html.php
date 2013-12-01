

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

                <form class="pull-right" action="?page=admin&action=delete_user" method="post" id="delete_user_form">
                    <input type='hidden' name='action' value='delete' />
                    <input type='hidden' name='user_id' value='<?php echo $user->getUserId(); ?>' />
                    <button onclick="document.getElementById('delete_user_form').submit(); return false;">Delete item</button>
                </form>

                <form class="pull-right" action="?page=admin&action=change_role" method="post" id="change_role_form">

                    <label>ROLE: </label>
                        <select>
                            <option <?php echo ($user->getUserRole()=='subscriber')?'selected':'' ?> >Subscriber</option>
                            <option <?php echo ($user->getUserRole()=='writer')?'selected':'' ?> >Writer</option>
                            <option <?php echo ($user->getUserRole()=='editor')?'selected':'' ?> >Editor</option>
                            <option <?php echo ($user->getUserRole()=='publisher')?'selected':'' ?> >Publisher</option>
                        </select>
                    <button>Edit</button>
                </form>

            </li><?php endforeach; ?>
        </ol>
    </div>
</div>