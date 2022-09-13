
</div>
</div>

<div id="footer"><div class="layui-footer">
    All rights reserved by <a href="https://phptravels.com" target="_blank">PHPTRAVELS</a>
</div>
</div>

</div>

<script>

    layui.use(['element', 'layer', 'util'], function(){
      var element = layui.element
      ,layer = layui.layer
      ,util = layui.util
      ,$ = layui.$;
      
      util.event('lay-header-event', {
        
        menuLeft: function(othis){
          layer.msg('展开左侧菜单的操作', {icon: 0});
        }
        
        ,menuRight: function(){
          layer.open({
            type: 1
            ,content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
            ,area: ['260px', '100%']
            ,offset: 'rt'  
            ,anim: 5
            ,shadeClose: true
          });
        }
      });
      
    });
    </script>
</body>
</html>