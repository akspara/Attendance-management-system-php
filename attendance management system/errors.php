

<?php  if(count($errors)>0):?> 

      <div class="error">

   <?Php foreach ($errors as $key): ?>
    <p><?php echo $key; ?> </p>
<?php endforeach; ?> 
</div>  
<?php endif; ?>


<style type="text/css">
	.error
{
  width: 92%;
  margin:0px auto;
  padding:10px;
  border:1px solid #a94442;
  color:#ff0000;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}
</style>