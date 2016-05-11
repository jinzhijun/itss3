<?php /* Smarty version 2.6.18, created on 2016-04-12 03:03:54
         compiled from Home/live.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Home/live.html', 26, false),)), $this); ?>
﻿<style>
body{margin-top:80px;}
#banner{background:url(images/live.jpg) top center no-repeat; height:442px;}
#live{overflow:hidden; margin:30px;}
#zvideo{float:left; background:#fff; width:78%; padding:1%; text-align:justify;}
#zvideo li{width:30%; display:inline-block; background:#f8f8f8;}
#zvideo li img{width:100%;}
#zvideo li div{margin:0 10px;}
#zvideo a{display:block; text-decoration:none;}
#zvideo .title{color:#000; font:14px/30px '微软雅黑'; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
#zvideo .price{font:20px/20px '微软雅黑'; color:red;}
#zvideo .timer{font:12px/30px '微软雅黑'; color:#999;}
</style>
<body>
	<div id="banner"></div>
	<div>
<section id="live">
	<div class="wrap">
<ul id="zvideo">
		<?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ls']['name'] = 'ls';
$this->_sections['ls']['show'] = true;
$this->_sections['ls']['max'] = $this->_sections['ls']['loop'];
$this->_sections['ls']['step'] = 1;
$this->_sections['ls']['start'] = $this->_sections['ls']['step'] > 0 ? 0 : $this->_sections['ls']['loop']-1;
if ($this->_sections['ls']['show']) {
    $this->_sections['ls']['total'] = $this->_sections['ls']['loop'];
    if ($this->_sections['ls']['total'] == 0)
        $this->_sections['ls']['show'] = false;
} else
    $this->_sections['ls']['total'] = 0;
if ($this->_sections['ls']['show']):

            for ($this->_sections['ls']['index'] = $this->_sections['ls']['start'], $this->_sections['ls']['iteration'] = 1;
                 $this->_sections['ls']['iteration'] <= $this->_sections['ls']['total'];
                 $this->_sections['ls']['index'] += $this->_sections['ls']['step'], $this->_sections['ls']['iteration']++):
$this->_sections['ls']['rownum'] = $this->_sections['ls']['iteration'];
$this->_sections['ls']['index_prev'] = $this->_sections['ls']['index'] - $this->_sections['ls']['step'];
$this->_sections['ls']['index_next'] = $this->_sections['ls']['index'] + $this->_sections['ls']['step'];
$this->_sections['ls']['first']      = ($this->_sections['ls']['iteration'] == 1);
$this->_sections['ls']['last']       = ($this->_sections['ls']['iteration'] == $this->_sections['ls']['total']);
?>
        	<li>
            	<a href="./live2.php?uid=<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['id']; ?>
&teh=<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['video_teacher']; ?>
">
                	<img src="./files/day_160325/201603251339564454.png">
                    <div class="title">标题:<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['video_title']; ?>
</div>
                    <div class="price">&yen; <?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['video_price']; ?>
</div>
                    <div class="timer">时间:<?php echo ((is_array($_tmp=$this->_tpl_vars['data'][$this->_sections['ls']['index']]['video_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %T") : smarty_modifier_date_format($_tmp, "%y-%m-%d %T")); ?>
</div>
                </a>
            </li>
       
		<?php endfor; else: ?>	
			数组中没有数据
		<?php endif; ?>
 </ul>
    </div>
</section>
	</div>
		<?php echo $this->_tpl_vars['page']; ?>

	</div>
</div>

<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>
</body>