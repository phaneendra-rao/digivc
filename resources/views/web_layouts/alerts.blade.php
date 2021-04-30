<?php if(count($errors))
{
?>
<script type="text/javascript">
  <?php foreach(array_reverse($errors) as $error)
  {
  ?>
  toastr.error('<?php echo $error; ?>');

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
   toastr.error('<?php echo $error; ?>');
  </script>
<?php
}
?>

<?php if($message = session('warning'))
{
?>
  <script type="text/javascript">
   toastr.warning('<?php echo $error; ?>');
  </script>
<?php
}
?>

<?php if($status = session('message'))
{
?>
  <script type="text/javascript">
   toastr.info('<?php echo $status; ?>');
  </script>
<?php
}
?>

<?php if($success = session('success'))
{
?>
  <script type="text/javascript">
   toastr.success('<?php echo $success; ?>');
  </script>
<?php
}
?>
