<script>
asyncTest("login test", function(){
    var user = array();
     user["nombre"] = "<?php echo $user["nombre"] ?>";
     user["email"] = "<?php echo $user["email"] ?>";
     user["password"] = "<?php echo $user["password"] ?>";
    $.post("<?php echo site_url(array("log","in")); ?>",user.serialize(),function(data){
        if(data > 0)
            ok(true);
        else
            ok(false);
        start();
    });
});
</script>