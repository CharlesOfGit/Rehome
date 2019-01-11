@extends('Home.public.center')
@section('title',"我的留言")
@section('main')
<div id="globalBigRight">
    <div class="tab_box">
        <div id="globalMessage" class="globalModule">
            <div class="tab_title"><h3>我的留言</h3>
            </div>
            <div class="globalModuleContent">
                <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
                    <table border="0" cellspacing="0" class="tableList topLine">
                        <tr>
                            <th>留言类型：</th>
                            <td>
                                <input name="msg_type" type="radio" value="0" checked="checked" id="msg_type0" /> <label for="msg_type0">留言</label>
                                <input type="radio" name="msg_type" value="1" id="msg_type1" /> <label for="msg_type1">投诉</label>
                                <input type="radio" name="msg_type" value="2" id="msg_type2" /> <label for="msg_type2">询问</label>
                                <input type="radio" name="msg_type" value="3" id="msg_type3" /> <label for="msg_type3">售后</label>
                                <input type="radio" name="msg_type" value="4" id="msg_type4" /> <label for="msg_type4">求购</label>
                            </td>
                        </tr>
                        <tr>
                            <th>主题：</th>
                            <td><input name="msg_title" type="text" size="30" class="textInput" /></td>
                        </tr>
                        <tr>
                            <th>留言内容：</th>
                            <td><textarea name="msg_content" cols="50" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <th>上传文件：</th>
                            <td><input type="file" name="message_img" size="45" /></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="hidden" name="act" value="act_add_message" />
                                <input type="submit" value="提交留言" />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <font color="red">小提示：</font><br />
                                您可以上传以下格式的文件：<br />gif、jpg、png、word、excel、txt、zip、ppt、pdf
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection