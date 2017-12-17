<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh" dir="ltr" class="chrome chrome58">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="/Public/add_table_files/jquery-ui-1.11.2.css">
<link rel="stylesheet" type="text/css" href="/Public/add_table_files/phpmyadmin.css">
<title>数据插入</title>
</head>
<body style="margin-bottom: 20px; padding-top: 61px;">
<div id="pma_navigation">
	<div id="pma_navigation_resizer">
	</div>
	<div id="pma_navigation_collapser">
		←
	</div>
	<div id="pma_navigation_content">
		<div id="pma_navigation_header">
			<a class="hide navigation_url" href=""></a>
			<div id="pmalogo">
				<a href="">
				<img src="/Public/add_table_files/logo_left.png" alt="phpMyAdmin" id="imgpmalogo"></a>
				 
			</div>
		
			<img src="/Public/add_table_files/ajax_clock_small.gif" title="正在加载…" alt="正在加载…" style="visibility: hidden; display:none" class="throbber">
		</div>
		<div id="pma_navigation_tree" class="list_container synced highlight" style="height: 918px;">
			
			
			<ul>
				
				<li id="navigation_controls_outer" class="">
				
				</li>
				
			</ul>
			<div id="pma_navigation_tree_content" style="height: 867px;">
				<ul>
					
					<li class="database">
					<center>	<a href="/Home/Index/controller" >
					<img src="/Public/logo.png" title="全部折叠" alt="全部折叠"></a>
					</center>
					</li>
					
					<li class="database">
					<a class="hover_show_full" href="" title="结构">数据库管理</a>
					</li>
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
	
</div>
<div id="prefs_autoload" class="notice" style="display:none">
	<form action="" method="post" class="disableAjax">
		
		<a href="">否</a>
	</form>
</div>


<div id="floating_menubar" style="margin-left: 243px; left: 0px; position: fixed; top: 0px; width: 100%; z-index: 99;">
	<div id="serverinfo">
		<img src="/Public/add_table_files/dot.gif" title="" alt="" class="icon ic_s_host item"><a href="" class="item">服务器: localhost</a><span class="separator item">&nbsp;»</span><img src="/Public/add_table_files/dot.gif" title="" alt="" class="icon ic_s_db item"><a href="" class="item">数据库: weixin</a><span class="separator item">&nbsp;»</span><img src="/Public/add_table_files/dot.gif" title="" alt="" class="icon ic_s_tbl item"><a href="" class="item">表: pre_<?php echo ($controller_id); ?></a>
		<div class="clearfloat">
		</div>
	</div>
	<div id="topmenucontainer" class="menucontainer">
		<ul id="topmenu" class="resizable-menu">
			<li><a class="tab" href=""><img src="/Public/add_table_files/dot.gif" title="浏览" alt="浏览" class="icon ic_b_browse"> 浏览</a></li>
			<li class="submenu"><a href="" class="tab nowrap"><img alt="" title="" src="/Public/add_table_files/dot.gif" class="icon ic_b_more">更多</a>
			<ul class="notonly">
			</ul>
			</li>
			<div class="clearfloat">
			</div>
		</ul>
	</div>
</div>
<span id="lock_page_icon"></span><a id="goto_pagetop" href=""><img src="/Public/add_table_files/dot.gif" title="点击以滚动到页面顶部" alt="点击以滚动到页面顶部" class="icon ic_s_top"></a>
<div id="pma_console_container">
	<div id="pma_console">
	
		<div class="content" style="height: 92px; margin-bottom: -98px; display: none;">
			
			<div class="query_input">
				<span class="console_query_input">
				<div class="CodeMirror cm-s-pma CodeMirror-wrap">
					<div style="overflow: hidden; position: relative; width: 3px; height: 0px; top: 0px; left: 0px;">
						<textarea autocorrect="off" autocapitalize="off" spellcheck="false" style="position: absolute; padding: 0px; width: 1000px; height: 1em; outline: none;" tabindex="0"></textarea>
					</div>
					<div class="CodeMirror-vscrollbar" cm-not-content="true" style="display: block; bottom: 0px; min-width: 18px;">
						<div style="min-width: 1px; height: 43px;">
						</div>
					</div>
					<div class="CodeMirror-hscrollbar" cm-not-content="true" style="min-height: 18px;">
						<div style="height: 100%; min-height: 1px; width: 0px;">
						</div>
					</div>
					<div class="CodeMirror-scrollbar-filler" cm-not-content="true">
					</div>
					<div class="CodeMirror-gutter-filler" cm-not-content="true">
					</div>
					<div class="CodeMirror-scroll" tabindex="-1">
						<div class="CodeMirror-sizer" style="margin-left: 0px; margin-bottom: 0px; border-right-width: 30px; min-height: 13px; padding-right: 0px; padding-bottom: 0px;">
							<div style="position: relative; top: 0px;">
								<div class="CodeMirror-lines">
									<div style="position: relative; outline: none;">
										<div class="CodeMirror-measure">
											<span><span>​</span>x</span>
										</div>
										<div class="CodeMirror-measure">
										</div>
										<div style="position: relative; z-index: 1;">
										</div>
										<div class="CodeMirror-cursors">
											<div class="CodeMirror-cursor" style="left: 0px; top: 0px; height: 13px;">
												&nbsp;
											</div>
										</div>
										<div class="CodeMirror-code">
											<pre class="">
												<span style="padding-right: 0.1px;"><span cm-text="">​</span></span>
											</pre>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div style="position: absolute; height: 30px; width: 1px; top: 13px;">
						</div>
						<div class="CodeMirror-gutters" style="display: none; height: 43px;">
						</div>
					</div>
				</div>
				</span>
			</div>
		</div>
		<div class="mid_layer">
		</div>
		<div class="card" id="pma_console_options">
			<div class="toolbar">
				<div class="switch_button">
					<span>选项</span>
				</div>
				<div class="button default">
					<span>Set default</span>
				</div>
			</div>
			<div class="content" style="height: 92px;">
				<label><input type="checkbox" name="always_expand">Always expand query messages</label><br>
				<label><input type="checkbox" name="start_history">Show query history at start</label><br>
				<label><input type="checkbox" name="current_query">Show current browsing query</label><br>
			</div>
		</div>
		<div class="templates">
			<div class="query_actions">
				<span class="action collapse">Collapse</span><span class="action expand">Expand</span><span class="action requery">Requery</span><span class="action edit">编辑</span><span class="action explain">Explain</span><span class="action profiling">性能分析</span><span class="text failed">Query failed</span><span class="text targetdb">数据库: <span></span></span><span class="text query_time">Queried time: <span></span></span>
			</div>
		</div>
	</div>
</div>
<div id="page_content">
	<a class="hide" id="update_recent_tables" href=""></a>
	<form id="insertForm" class="lock-page" method="post" action="" name="insertForm" enctype="multipart/form-data">
		<input type="hidden" name="db" value="weixin">
		
		<input type="hidden" name="table" value="pre_1">
		<input type="hidden" name="goto" value="tbl_sql.php">
		<input type="hidden" name="err_url" value=""><input type="hidden" name="sql_query" value="">
		<table class="insertRowTable topmargin">
		<a href="/Home/Index/controller"><img src="/Public/banner.png"></a>
		<img src="/Public/sql_jiegou.png">
		<h1>数据表结构如上：</h1>
		<h1>在下面插入一条数据：</h1>
		</table>
		
		
		
		
		<br>
		<div class="clearfloat">
		</div>
	
		<table class="insertRowTable topmargin">
		<thead>
		<tr>
			<th>
				字段
			</th>
			<th>
				类型
			</th>
			<th>
				值
			</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th colspan="5" class="tblFooters right">
				<input type="submit" value="执行">
			</th>
		</tr>
		</tfoot>
		<tbody>
		<tr class="noclick odd">
			<td class="center">
				<span style="border-bottom: 1px dashed black;" title="商品ID">id</span><input type="hidden" name="fields_name[multi_edit][1][b80bb7740288fda1f201890375a60c8f]" value="id">
			</td>
			<td class="center nowrap">
				<span class="column_type">int(11)</span>
			</td>
			
			<td>
			</td>
			<td data-type="int" data-decimals="11">
				<span class="default_value hide"></span>
				<input type="text" name="fields[multi_edit][1][b80bb7740288fda1f201890375a60c8f]" value="" size="11" min="-2147483648" max="2147483647" data-type="INT" class="textfield" onchange="return verificationsAfterFieldChange(&#39;b80bb7740288fda1f201890375a60c8f&#39;, &#39;1&#39;,&#39;int(11)&#39;)" tabindex="5" id="field_5_3"><input type="hidden" name="auto_increment[multi_edit][1][b80bb7740288fda1f201890375a60c8f]" value="1">
			</td>
		</tr>
		<tr class="noclick even">
			<td class="center">
				<span style="border-bottom: 1px dashed black;" title="商品名称">name</span><input type="hidden" name="fields_name[multi_edit][1][b068931cc450442b63f5b3d276ea4297]" value="name">
			</td>
			<td class="center nowrap">
				<span class="column_type">varchar(30)</span>
			</td>
			
			<td>
			</td>
			<td data-type="varchar" data-decimals="30">
				<span class="default_value hide"></span>
				<input type="text" name="fields[multi_edit][1][b068931cc450442b63f5b3d276ea4297]" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" onchange="return verificationsAfterFieldChange(&#39;b068931cc450442b63f5b3d276ea4297&#39;, &#39;1&#39;,&#39;varchar(30)&#39;)" tabindex="6" id="field_6_3">
			</td>
		</tr>
		<tr class="noclick odd">
			<td class="center">
				<span style="border-bottom: 1px dashed black;" title="商品描述">description</span><input type="hidden" name="fields_name[multi_edit][1][67daf92c833c41c95db874e18fcb2786]" value="description">
			</td>
			<td class="center nowrap">
				<span class="column_type">varchar(255)</span>
			</td>
			
			<td>
			</td>
			<td data-type="varchar" data-decimals="255">
				<span class="default_value hide"></span>
				<textarea name="fields[multi_edit][1][67daf92c833c41c95db874e18fcb2786]" class="char" data-maxlength="255" rows="2" cols="40" dir="ltr" id="field_7_3" onchange="return verificationsAfterFieldChange(&#39;67daf92c833c41c95db874e18fcb2786&#39;, &#39;1&#39;,&#39;varchar(255)&#39;)" tabindex="7" data-type="CHAR"></textarea>
			</td>
		</tr>
		<tr class="noclick even">
			<td class="center">
				<span style="border-bottom: 1px dashed black;" title="商品价格">price</span><input type="hidden" name="fields_name[multi_edit][1][78a5eb43deef9a7b5b9ce157b9d52ac4]" value="price">
			</td>
			<td class="center nowrap">
				<span class="column_type">decimal(10,2)</span>
			</td>
			
			<td>
			</td>
			<td data-type="decimal" data-decimals="10,2">
				<span class="default_value hide">0.00</span>
				<input type="text" name="fields[multi_edit][1][78a5eb43deef9a7b5b9ce157b9d52ac4]" value="0.00" size="12" data-type="NUMBER" class="textfield" onchange="return verificationsAfterFieldChange(&#39;78a5eb43deef9a7b5b9ce157b9d52ac4&#39;, &#39;1&#39;,&#39;decimal(10,2)&#39;)" tabindex="8" id="field_8_3">
			</td>
		</tr>
		</tbody>
		</table>
		<br>
		<div class="clearfloat">
		</div>
		<div id="gis_editor">
		</div>
		<div id="popup_background">
		</div>
		<br>
		
	</form>
	
</div>


<div class="clearfloat" id="pma_errors">
</div>
<script data-cfasync="false" type="text/javascript">// <![CDATA[
AJAX.cache.primer = { url: "index.php?db=weixin&table=pre_1&server=1&target=tbl_change.php&token=5e1342e24c429fe53e2a2b8eba3130ec", scripts: [{"name":"jquery/jquery-1.11.1.min.js","fire":0},{"name":"sprintf.js","fire":1},{"name":"ajax.js","fire":0},{"name":"keyhandler.js","fire":1},{"name":"jquery/jquery-ui-1.11.2.min.js","fire":0},{"name":"jquery/jquery.cookie.js","fire":0},{"name":"jquery/jquery.mousewheel.js","fire":0},{"name":"jquery/jquery.event.drag-2.2.js","fire":0},{"name":"jquery/jquery-ui-timepicker-addon.js","fire":0},{"name":"jquery/jquery.ba-hashchange-1.3.js","fire":0},{"name":"jquery/jquery.debounce-1.0.5.js","fire":0},{"name":"menu-resizer.js","fire":1},{"name":"cross_framing_protection.js","fire":0},{"name":"rte.js","fire":1},{"name":"tracekit/tracekit.js","fire":1},{"name":"error_report.js","fire":1},{"name":"doclinks.js","fire":1},{"name":"functions.js","fire":1},{"name":"navigation.js","fire":0},{"name":"indexes.js","fire":1},{"name":"common.js","fire":1},{"name":"sql.js","fire":1},{"name":"tbl_change.js","fire":1},{"name":"big_ints.js","fire":1},{"name":"gis_data_editor.js","fire":1},{"name":"codemirror/lib/codemirror.js","fire":0},{"name":"codemirror/mode/sql/sql.js","fire":0},{"name":"codemirror/addon/runmode/runmode.js","fire":0},{"name":"codemirror/addon/hint/show-hint.js","fire":0},{"name":"codemirror/addon/hint/sql-hint.js","fire":0},{"name":"console.js","fire":1},{"name":"config.js","fire":1}], menuHash: "a20f2969"};
AJAX.scriptHandler;
$(function() {});
// ]]></script>

<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
</div>




<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
</div>
<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
</div>
<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
</div>
</body>
</html>