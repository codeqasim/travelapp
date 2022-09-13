<!-- 
<blockquote class="layui-elem-quote layui-text">
<p>Main Settings</p>
</blockquote> 
-->

<fieldset class="layui-elem-field layui-field-title">
  <legend>Main Settings</legend>
</fieldset>

<form id="settings" class="layui-form" name="form" method="post">

        <div class="layui-form-item">
        <label class="layui-form-label">Business Name</label>
        <div class="layui-input-block">
            <input type="text" name="app_name" lay-verify="title" autocomplete="off" placeholder="Business Name" class="business_name layui-input">
        </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
            <label class="layui-form-label">API Key</label>
            <div class="layui-input-inline">
                <input disable type="text" name="api_key" lay-verify="required|phone" autocomplete="off" class="layui-input">
            </div>
            </div>
        </div>

        <div class="layui-form-item">
        <label class="layui-form-label">Website Offline</label>
        <div class="layui-input-inline">
            <select name="site_offline">
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
            </select>
        </div>
        </div>

        <script>
            // ENABLE DISABLE OFFLINE MESSAGE BOX
            $('.offline_message').val(1)

            // OFFLINE OPTION SELECTION
            $(".site_offline").on('change', function() { offstatus(); });

            layui.use(['layer', 'form'], function(){
            
                form=layui.form; form.on('select', function(data){
                var val=data.value; 
                console.info(val);

            if (val == 1) { $('.offline_message').attr('disabled', false)
            } else { $('.offline_message').attr('disabled', true) }

            });
            });

            var status = $(".site_offline").val();
            if(status == "1"){ $("#offmsg").prop("readonly",false);
            }else{ $("#offmsg").prop("readonly",true); }
            
        </script>

        <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">Message Offline</label>
        <div class="layui-input-block">
        <textarea id="offmsg" placeholder="Offline Message" class="offline_message layui-textarea">Our website is offline currently please visit us back soon.</textarea>
        </div>
        </div>

    <fieldset class="layui-elem-field layui-field-title">
    <legend>Accounts</legend>
    </fieldset>

    <!-- GUEST BOOKING -->
    <div class="layui-form-item">
    <label class="layui-form-label">Guest Booking</label>

    <form action="">
    <div class="layui-input-block">
        <input class="guest_booking" type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="guest_booking" lay-text="ON|OFF">
        <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
            <em>ON</em><i></i>
        </div>
    </div>

    </form>

    

    <!-- <div class="layui-input-inline">
        <select name="guest_booking">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div> -->

    </div>
    <script>
        $("[name='guest_booking']").val(1)
    </script>

    <div class="layui-form-item">
    <label class="layui-form-label">User Registration</label>
    <div class="layui-input-inline">
        <select name="user_registration">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    </div>
    <script>
        $("[name='user_registration']").val(1)
    </script>

    <div class="layui-form-item">
    <label class="layui-form-label">Suppliers</label>
    <div class="layui-input-inline">
        <select name="suppliers_registration">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    </div>
    <script>
        $("[name='suppliers_registration']").val(1)
    </script>

    <div class="layui-form-item">
    <label class="layui-form-label">Agents</label>
    <div class="layui-input-inline">
        <select name="agents_registration">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    </div>
    <script>
        $("[name='agents_registration']").val(1)
    </script>



    <div class="layui-form-item">
        <div class="layui-input-block">
        <button id="submit" type="submit" class="layui-btn">Submit</button>
        </div>
    </div>

</form>


<script>

    layui.use ( 'form' , function (){ 
        var form = layui.form;
        form.on ( 'switch(guest_booking)' , function ( data ) {  
            var status = data.elem.checked ; 
            if ( status ) { status = 1 ; 
            } else { status = 0; }

            // layer.msg(status)
            
        $.ajax({
          url: "<?=api_url?>login",
          type: 'POST',
          dataType: "json",
          data: {
            guest_booking: 1,
          },
        }).done(function(res) {
          console.log(res.data);

          if(res.status == 'true'){

        } else {  
            layer.msg('Email or password invalid please try again');
        } })

            // var url = $(this).data('<?=api_url?>login');
            // $.post ( url , { status : status }, function ( res ) {   
            //     if ( res.code ) { 
            //         Layer.MSG ( RES.MSG );
            //     }
            // });

        });
    });

    // layui.use(['form'], function() {          
    //     form=layui.form; 
    //     form.on('checkbox', function(data){
    //     var val=data.value; console.info(val);
    // });
    // });

    // $(".guest_booking").on('change', function() { alert(1) });

    // $("#submit").click(function(){
    
 
    //     var guest_booking = $('.guest_booking').val();

    //   alert(guest_booking);

      

    // })

    $("#settings").submit(function() {
      event.preventDefault();

      // GET FORM PARAMS AND VALUES
      var guest_booking = $('.guest_booking').val();

      alert(guest_booking);

        // $.ajax({
        //   url: "<?=api_url?>login",
        //   type: 'POST',
        //   dataType: "json",
        //   data: {
        //     guest_booking: 1,
        //   },
        // }).done(function(res) {
        //   console.log(res.data);

        //   if(res.status == 'true'){

        //     } else {  
        //       layer.msg('Email or password invalid please try again');
        //     } })
        
    });

    </script>