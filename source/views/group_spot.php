<div>
    <h1>Spot Groups!</h1>
</div>

<div id="right-column">
    <?php include __SITE_PATH . "/views/group_right_column.php"; ?> 
</div>

<div id="left-column">
    <div id="group-tag-nav">
    You may be interested in the following groups:
<!--
        <ul class="tags">
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Travel</a></li>
        </ul>
-->
    </div>

    <div class="group-list">
        <ul class="groups">
        <?php foreach($all_groups as $group) {   ?>
            <li class="group-item">
                <div class="pic">
                <a target="_blank" title="<?= $group[1] ?>" href="<?= "index.php?rt=group/details&gid=" . $group[0] ?>">
                <img src="<?= "../front_end/image/group_icon/" . $group[0], ".jpg" ?>" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                    <a target="_blank" title="<?= $group[1] ?>" href="<?= "index.php?rt=group/details&gid=" . $group[0] ?>"><?= $group[1] ?></a><span class="follow-num">&nbsp;&nbsp;<?= $all_groups_size[$group[0]] ?>个成员</span>
                    </div>
                    <p>
                    <?= $group[4] ?>
                    ...
                    </p>
                </div>
            </li>
        <?php }   ?>
            
<!--
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="武汉台球俱乐部" href="http://www.douban.com/group/snooker/">
                        <img src="http://img3.douban.com/icon/g120319-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="武汉台球俱乐部" href="http://www.douban.com/group/snooker/">武汉台球俱乐部</a><span class="follow-num">921个成员</span>
                    </div>
                    <p>
                        武汉地区台球球友俱乐部


                        本群纯属公益群！
                        广告请回避！谢谢！

            ...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="在大理烤太阳" href="http://www.douban.com/group/xgfz/">
                        <img src="http://img3.douban.com/icon/g261443-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="在大理烤太阳" href="http://www.douban.com/group/xgfz/">在大理烤太阳</a><span class="follow-num">3964个成员</span>
                    </div>
                    <p>
                        在大理

            做一个太阳能

            有事没事晒晒太阳

            打个呵欠吐出来就是兰...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="Politecnico di Milano 米兰理工大学" href="http://www.douban.com/group/polimi/">
                        <img src="http://img3.douban.com/icon/g52566-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="Politecnico di Milano 米兰理工大学" href="http://www.douban.com/group/polimi/">Politecnico di Milano 米兰理工大学</a><span class="follow-num">3148个成员</span>
                    </div>
                    <p>
                        http://www.polimi.it/

            意大利語小组  
            http://www.douban.com/grou...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="战斗在西班牙" href="http://www.douban.com/group/45607/">
                        <img src="http://img3.douban.com/icon/g45607-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="战斗在西班牙" href="http://www.douban.com/group/45607/">战斗在西班牙</a><span class="follow-num">5353个成员</span>
                    </div>
                    <p>
                        这里有翠绿的橄榄树，
            暖洋洋的地中海阳光，
            神秘的阿拉罕布拉宫，
            ...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="北京CBD" href="http://www.douban.com/group/BCBD/">
                        <img src="http://img3.douban.com/icon/g64505-2.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="北京CBD" href="http://www.douban.com/group/BCBD/">北京CBD</a><span class="follow-num">5617个成员</span>
                    </div>
                    <p>
                        北京中央商务区( Ｂeijing Ｃentral Ｂusiness Ｄistrict )西起东大桥路...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="重庆大学生&amp;文艺小青年联盟" href="http://www.douban.com/group/cqdxslm/">
                        <img src="http://img3.douban.com/icon/g293732-4.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="重庆大学生&amp;文艺小青年联盟" href="http://www.douban.com/group/cqdxslm/">重庆大学生&amp;文艺小青年联盟</a><span class="follow-num">6130个成员</span>
                    </div>
                    <p>
                        能找到一堆谈得来的朋友实属不易，
            周围的人很难找到和你胃口的，
            来...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="南京业余电影协会" href="http://www.douban.com/group/njafu/">
                        <img src="http://img3.douban.com/icon/g188355-5.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="南京业余电影协会" href="http://www.douban.com/group/njafu/">南京业余电影协会</a><span class="follow-num">1322个成员</span>
                    </div>
                    <p>
                        为了更大的发展，我们正式改名为南京业余电影协会，归到豆瓣的主办方南...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="我们都是迪拜人" href="http://www.douban.com/group/dubairen/">
                        <img src="http://img3.douban.com/icon/g227344-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="我们都是迪拜人" href="http://www.douban.com/group/dubairen/">我们都是迪拜人</a><span class="follow-num">3840个成员</span>
                    </div>
                    <p>
                        迪拜人网站 网址：www.dubairen.com
            迪拜人分类信息（基于腾讯微博，需...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="上海电影艺术学院" href="http://www.douban.com/group/SFA/">
                        <img src="http://img3.douban.com/icon/g20355-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="上海电影艺术学院" href="http://www.douban.com/group/SFA/">上海电影艺术学院</a><span class="follow-num">695个成员</span>
                    </div>
                    <p>
                        各位同学     资源共享
            互通有无     学习进步
            发展文化革命运动 增强...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="哈尔滨影迷会" href="http://www.douban.com/group/bingchen/">
                        <img src="http://img3.douban.com/icon/g119486-2.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="哈尔滨影迷会" href="http://www.douban.com/group/bingchen/">哈尔滨影迷会</a><span class="follow-num">1871个成员</span>
                    </div>
                    <p>
                            哈尔滨影迷会为哈市网友自发组织创建，非以赢利为目的的电影同好网...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="迷恋希腊" href="http://www.douban.com/group/85862/">
                        <img src="http://img3.douban.com/icon/g85862-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="迷恋希腊" href="http://www.douban.com/group/85862/">迷恋希腊</a><span class="follow-num">4951个成员</span>
                    </div>
                    <p>
                        找到对的人 对的时间 去对的地方 看那向往的一片蓝 这就是简单的幸福 
               
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="一起去斯里兰卡." href="http://www.douban.com/group/srilanka001/">
                        <img src="http://img3.douban.com/icon/g301626-5.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="一起去斯里兰卡." href="http://www.douban.com/group/srilanka001/">一起去斯里兰卡.</a><span class="follow-num">7034个成员</span>
                    </div>
                    <p>
                        斯里兰卡自助游.旅行信息集合
            -------------------------------------
            ...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="乌镇_____似水年华。" href="http://www.douban.com/group/118474/">
                        <img src="http://img3.douban.com/icon/g118474-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="乌镇_____似水年华。" href="http://www.douban.com/group/118474/">乌镇_____似水年华。</a><span class="follow-num">3944个成员</span>
                    </div>
                    <p>
                        



            赤脚走在乌镇的青石板路上，从脚底慢慢浸透整个身躯，让乌镇浓...
                    </p>
                </div>
            </li>

            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="武汉摄影" href="http://www.douban.com/group/photoer/">
                        <img src="http://img3.douban.com/icon/g254979-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="武汉摄影" href="http://www.douban.com/group/photoer/">武汉摄影</a><span class="follow-num">4820个成员</span>
                    </div>
                    <p>
                        目标：
            所有的摄影师能提高摄影技术与审美 ；
            所有的模特能拿到自己喜...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="教你怎样对付外星人" href="http://www.douban.com/group/stopalienattack/">
                        <img src="http://img3.douban.com/icon/g49491-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="教你怎样对付外星人" href="http://www.douban.com/group/stopalienattack/">教你怎样对付外星人</a><span class="follow-num">5272个成员</span>
                    </div>
                    <p>
                        为了防止外星人随时进攻地球的威胁，我们必须学会必要的识别与对付外星...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="让我感谢你，赠我空欢喜。" href="http://www.douban.com/group/343444/">
                        <img src="http://img3.douban.com/icon/g343444-3.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="让我感谢你，赠我空欢喜。" href="http://www.douban.com/group/343444/">让我感谢你，赠我空欢喜。</a><span class="follow-num">21251个成员</span>
                    </div>
                    <p>
                                          第一次哭是因为你不在，
                       
                       ...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="MBTI中心站" href="http://www.douban.com/group/348758/">
                        <img src="http://img3.douban.com/icon/g348758-2.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="MBTI中心站" href="http://www.douban.com/group/348758/">MBTI中心站</a><span class="follow-num">1845个成员</span>
                    </div>
                    <p>
                        很多人没加入这里，却一直在关注这里；很多事找不到发源地，最终大家确...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="我不禁悲从中来" href="http://www.douban.com/group/anti-nc/">
                        <img src="http://img3.douban.com/icon/g143780-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="我不禁悲从中来" href="http://www.douban.com/group/anti-nc/">我不禁悲从中来</a><span class="follow-num">8784个成员</span>
                    </div>
                    <p>
                        只抽风，不谈情

                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="一天不抽风就浑身痒痒：末日快樂" href="http://www.douban.com/group/choufeng/">
                        <img src="http://img3.douban.com/icon/g72191-290.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="一天不抽风就浑身痒痒：末日快樂" href="http://www.douban.com/group/choufeng/">一天不抽风就浑身痒痒：末日快樂</a><span class="follow-num">11224个成员</span>
                    </div>
                    <p>
                        小组介绍非常重要！！！大家要认真学习领会精神！！！要仔细看！！！！
            ...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="一张开嘴就跑题" href="http://www.douban.com/group/35310/">
                        <img src="http://img3.douban.com/icon/g35310-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="一张开嘴就跑题" href="http://www.douban.com/group/35310/">一张开嘴就跑题</a><span class="follow-num">9585个成员</span>
                    </div>
                    <p>
                        要么闭嘴，要么发散。

            被误会是表达者的宿命…
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="量子社群心传输" href="http://www.douban.com/group/EVT/">
                        <img src="http://img3.douban.com/icon/g181507-9.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="量子社群心传输" href="http://www.douban.com/group/EVT/">量子社群心传输</a><span class="follow-num">755个成员</span>
                    </div>
                    <p>
                        ·
            ···························两分钟的...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="表白特工队。" href="http://www.douban.com/group/311112/">
                        <img src="http://img3.douban.com/icon/g311112-2.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="表白特工队。" href="http://www.douban.com/group/311112/">表白特工队。</a><span class="follow-num">8094个成员</span>
                    </div>
                    <p>
                        我爱你，不是因为你是一个怎样的人，而是因为我喜欢与你在一起时的感觉...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="我们都是时差党。" href="http://www.douban.com/group/time_difference/">
                        <img src="http://img3.douban.com/icon/g249077-3.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="我们都是时差党。" href="http://www.douban.com/group/time_difference/">我们都是时差党。</a><span class="follow-num">5141个成员</span>
                    </div>
                    <p>
                        大家都睡了我还在
            大家醒了我就睡了
            因为我不在东八区
            或者我的生物...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="末日合作突击小队" href="http://www.douban.com/group/Survival/">
                        <img src="http://img3.douban.com/icon/g257051-2.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="末日合作突击小队" href="http://www.douban.com/group/Survival/">末日合作突击小队</a><span class="follow-num">1654个成员</span>
                    </div>
                    <p>
                        好吧，我承认我作为一个无良的，懒惰的，卑鄙的组长已经至少两个月没回...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="怕鸡，怕鸟" href="http://www.douban.com/group/nobirds/">
                        <img src="http://img3.douban.com/icon/g124911-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="怕鸡，怕鸟" href="http://www.douban.com/group/nobirds/">怕鸡，怕鸟</a><span class="follow-num">3135个成员</span>
                    </div>
                    <p>
                        即使是鸡毛蒜皮，对我们也是“禽”天霹雳 
            哪怕是鸟语花香，我们也不能...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="我们的名字很长很长很长很长长" href="http://www.douban.com/group/longer/">
                        <img src="http://img3.douban.com/icon/g29550-1.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="我们的名字很长很长很长很长长" href="http://www.douban.com/group/longer/">我们的名字很长很长很长很长长</a><span class="follow-num">309个成员</span>
                    </div>
                    <p>
                        我们是豆瓣星球的仅存硕果、是见证豆瓣管理制度演变的活化石、是豆瓣短...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="一有点钱就烧包" href="http://www.douban.com/group/107785/">
                        <img src="http://img3.douban.com/icon/g107785-3.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="一有点钱就烧包" href="http://www.douban.com/group/107785/">一有点钱就烧包</a><span class="follow-num">4677个成员</span>
                    </div>
                    <p>
                        花今天的钱圆今天的梦
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="喜欢有人为我梳头" href="http://www.douban.com/group/comb-my-hair/">
                        <img src="http://img3.douban.com/icon/g213950-27.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="喜欢有人为我梳头" href="http://www.douban.com/group/comb-my-hair/">喜欢有人为我梳头</a><span class="follow-num">1224个成员</span>
                    </div>
                    <p>
                        爱的旋律并不在于“头发”，是在于“梳”的过程。



            错过的节目总...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="博物组" href="http://www.douban.com/group/articience/">
                        <img src="http://img3.douban.com/icon/g167162-4.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="博物组" href="http://www.douban.com/group/articience/">博物组</a><span class="follow-num">5424个成员</span>
                    </div>
                    <p>
                        飞禽走兽 花鸟鱼虫 天文地理  古今中外 博物致志 

            博物组创始于2007...
                    </p>
                </div>
            </li>
            <li class="group-item">
                <div class="pic">
                    <a target="_blank" title="胶片公社" href="http://www.douban.com/group/lmmusic/">
                        <img src="http://img3.douban.com/icon/g304640-3.jpg" alt="" height="50" width="50">
                    </a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" title="胶片公社" href="http://www.douban.com/group/lmmusic/">胶片公社</a><span class="follow-num">2140个成员</span>
                    </div>
                    <p>
                        【胶片公社】温州本土胶片冲扫小店【Q群：96406941】

            胶片的日子，一...
                    </p>
                </div>
            </li>
-->
        </ul>
    </div>





</div>
