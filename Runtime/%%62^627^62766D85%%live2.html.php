<?php /* Smarty version 2.6.18, created on 2016-04-12 08:00:44
         compiled from Home/live2.html */ ?>
﻿<style type="text/css">
h1{font-family:"微软雅黑";font-size:40px;margin:20px 0;;border-bottom:solid 1px #ccc;padding-bottom:20px;letter-spacing:2px;}
.time-item strong{background:#C71C60;color:#fff;line-height:49px;font-size:36px;font-family:Arial;padding:0 10px;margin-right:10px;border-radius:5px;box-shadow:1px 1px 3px rgba(0,0,0,0.2);}
#day_show{float:left;line-height:49px;color:#c71c60;font-size:32px;margin:0 10px;font-family:Arial, Helvetica, sans-serif;}
.item-title .unit{background:none;line-height:49px;font-size:24px;padding:0 10px;float:left;}
</style>
<script type="text/javascript" src="./jquery-1.6.2.min.js"></script>
<script type="text/javascript">
var intDiff = parseInt(<?php echo $this->_tpl_vars['data'][0]['video_time']-$this->_tpl_vars['now']; ?>
);//倒计时总秒数
function timer(intDiff){
	window.setInterval(function(){
	var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值
	if(intDiff > 0){
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
	}
	if (minute <= 9) minute = '0' + minute;
	if (second <= 9) second = '0' + second;
	$('#day_show').html(day+"天");
	$('#hour_show').html('<s id="h"></s>'+hour+'时');
	$('#minute_show').html('<s></s>'+minute+'分');
	$('#second_show').html('<s></s>'+second+'秒');
	intDiff--;
	}, 1000);
}
$(function(){
	timer(intDiff);
});
</script>

<div align="center" style="width:416px; margin:0 auto">
<div class="time-item">
	<span id="day_show">0天</span>
	<strong id="hour_show">0时</strong>
	<strong id="minute_show">0分</strong>
	<strong id="second_show">0秒</strong>
</div>
</div>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>
<div>
	<table>
		<tr>
			<?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['data_1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<td><?php echo $this->_tpl_vars['data_1'][$this->_sections['ls']['index']]['video_t']; ?>
</td><br/>
				<td><?php echo $this->_tpl_vars['data_1'][$this->_sections['ls']['index']]['page_title']; ?>
</td><br/>
				<td><a href="./live3.php?id=<?php echo $this->_tpl_vars['data_1'][$this->_sections['ls']['index']]['id']; ?>
">点击观看</a></td><br/>
			<?php endfor; else: ?>
				没有数据
			<?php endif; ?>
		</tr>
	</table>
</div>
