<!-- 
<blockquote class="layui-elem-quote layui-text">
<p>Main Settings</p>
</blockquote> 
-->

<fieldset class="layui-elem-field layui-field-title">
  <legend>Main Settings</legend>
</fieldset>

<div class="layui-form-item">
<label class="layui-form-label">Business Name</label>
<div class="layui-input-block">
    <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="Business Name" class="layui-input">
</div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">验证手机</label>
      <div class="layui-input-inline">
        <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" class="layui-input demo-phone">
      </div>
    </div>
</div>
