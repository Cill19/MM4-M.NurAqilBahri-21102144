<?php
if(isset($_SESSION["message"])){
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}
?>
<div class="alert alert-<?php echo (isset($message))?($message['type']):'' ?> alertdismissible fade <?php echo (isset($message))?($message['show']):'' ?>" role="alert">
<i class="fa fa-
<?php echo (isset($message))?($message['icon']):'' ?>"></i> <?php echo (isset($message))?($message[
'text']):'' ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>