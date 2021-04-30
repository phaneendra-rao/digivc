<?php if(count($errors))
{
?>
<script type="text/javascript">
  <?php foreach(array_reverse($errors) as $error)
  {
  ?>
    new PNotify({
        title: '<?php echo $error; ?>',
        icon: 'icofont icofont-info-circle',
        type: 'error'
    });

  <?php
  }
  ?>
</script>
<?php
}
?>

<?php if($error = session('error'))
{
?>
  <script type="text/javascript">
    new PNotify({
        title: '<?php echo $error; ?>',
        icon: 'icofont icofont-info-circle',
        type: 'error'
    });
  </script>
<?php
}
?>

<?php if($message = session('warning'))
{
?>
  <script type="text/javascript">
    new PNotify({
        title: '<?php echo $message; ?>',
        icon: 'icofont icofont-info-circle',
        type: 'info'
    });
  </script>
<?php
}
?>

<?php if($status = session('message'))
{
?>
  <script type="text/javascript">
    new PNotify({
        title: '<?php echo $status; ?>',
        icon: 'icofont icofont-info-circle',
        type: 'info'
    });
  </script>
<?php
}
?>

<?php if($success = session('success'))
{
?>
  <script type="text/javascript">
    new PNotify({
        title: '<?php echo $success; ?>',
        icon: 'icofont icofont-info-circle',
        type: 'success'
    });
  </script>
<?php
}
?>
