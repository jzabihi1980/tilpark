<ol class="breadcrumb">
  <li><a href="<?php echo site_url(); ?>">Yönetim Paneli</a></li>
  <li><a href="<?php echo site_url('account'); ?>">Hesap Yönetimi</a></li>
  <li class="active">Hesap Listesi</li>
</ol>

<div class="row">
<div class="col-md-12">


<div class="form-group">
    <div class="input-prepend input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>
        <input type="text" id="q" name="q" class="form-control ff-1 number input-lg" placeholder="hesap kartı arama..." value="">
    </div>
</div> <!-- /.form-group -->
<script>
$('#q').keyup(function() {
	$.get( "lists_ajax/"+$(this).val(), function( data ) {
		$(".account_list").html(data);
	});
});
</script>
<div class="account_list">
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Kodu</th>
                <th>Hesap Kartı</th>
                <th>Yetkili Adı Soyadı</th>
                <th>Şehir</th>
                <th width="100">Telefon</th>
                <th width="100">Bakiye</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($accounts as $account): ?>
            <tr>
                <td class="fs-10"><a href="<?php echo site_url('account/view/'.$account['id']); ?>"><?php echo text_crop($account['code'],0,20); ?></a></td>
                <td><a href="<?php echo site_url('account/view/'.$account['id']); ?>"><?php echo text_crop($account['name'],0,40); ?></a></td>
                <td class="fs-10"><?php echo text_crop($account['name_surname'],0,20); ?></td>
                <td class="fs-10"><?php echo text_crop($account['city'],0,15); ?></td>
                <td><?php echo text_crop($account['phone'],0,11); ?></td>
                <td class="text-right"><?php echo get_money($account['balance']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="text-center">
	   <?php echo $pagination; ?>
    </div> <!-- /.text-center -->

    
</div> <!-- /.account_list -->





</div> <!-- /.col-md-12 -->
</div> <!-- /.row -->

<div class="h20"></div>