<div>
    <a href="index.php?rt=index"><img src="./front_end/image/logo.jpg"/></a>
</div>

<div id="nav">

    <div id="signup">
        Welcome to MyNotes!</br>
        Here,You can meet a bunch of friends who are big fans of reading just like you.</br>
        Here,You can share your notes,your feelings,your favorite books or authors.</br>
        Here,You can think and find the answer of futher,life,live,and love of yourself.</br>
        Here,You are in your world,be yourself,just like one of us.</br></br>
        <a href="index.php?rt=index/register"><button>JoinUs</button></a>
    </div>

    <div id="login">
        <div class="entry">
            <span>UserName</span>
            <input id="name" type="text" maxlength="30" size="30" tabindex="1"/>
        </div>
                    
        <div class="entry">
            <span>PassWord</span>
            <input id="pwd" type="password" maxlength="30" size="30" tabindex="2"/>
        </div>

        <div class="tips" id="warn">
            Not exsted user OR Not matched password,please check
        </div>
                    
        <div class="entry">
            If you are the administrator,
            <a href="index.php?rt=admin" >here</a> to login
        </div>

        <div class="entry">
             <button id="check">LogIn</button>
        </div>  	
    </div>
</div>

<div id="resources">

    <div id="public-topics">
        <h1>Public topics:What people are reading...</h1>
        <ul>
        <?php
            for($ct = 0;$ct < count($resources); $ct ++){
            ?>
                    <li>
                        <a href="index.php?rt=index/resource&rid=<?= $resources[$ct]['rid'] ?>" >
                                <?= $resources[$ct]['rtitle'] ?></a>	
                    </li>
            <?php
            }
            ?>
        </ul>
    </div>

</div>

			
