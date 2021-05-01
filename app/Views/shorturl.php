<main id="main" >
    <section class="inner-page">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-10">
                    <form class="card card-sm" action="<?= base_url() ?>/shorturl/create" method="POST" >
                        <div class="card-body row no-gutters align-items-center text-center">
                            <?=csrf_field()?>
                            <div class="col-12">
                                <h2>Paste the URL to be shortened</h2>
                            </div>
                            
                            <!--end of col-->
                            <div class="col">
                                <input class="form-control form-control-lg form-control-borderless" type="url" placeholder="https://yourdomain.com" id="fullurl" name="fullurl" required >
                            </div>
                            <!--end of col-->
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" type="submit">shorten URL</button>
                            </div>
                            <!--end of col-->
                        </div>
                    </form>
                    <hr/>

                    
                    <?php if(!empty($shorturl) && is_array($shorturl)) :?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Short Url</th>
                                    <th>Full Url</th>
                                    <th>สถิติการคลิก/เปิด</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <?php foreach ($shorturl as $key => $value) : ?>
                            <tr>
                                <td><?=esc($value['id'])?></td>
                                <td><a href="/view/<?=esc($value['shorturl'])?>" target="_blank"><?=esc($value['shorturl'])?></a></td>
                                <td><a href="/view/<?=esc($value['shorturl'])?>" target="_blank"><?=esc($value['fullurl'])?></a></td>
                                <td><?=esc($value['view'])?></td>
                                <td>
                                    
                                   
                                    <button type="button" class="btn btn-sm btn-danger delete" data-id="<?=esc($value['id'])?>" onclick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่ ?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                   
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </table>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('/shorturl/delete')?>" method="post"  id="idform">
            <?=csrf_field()?>
            <input type="hidden" name="ids" id="ids" value="">
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('.delete').click( function(){
        var ids = $(this).data('id');
        $('#ids').val(ids);
        $('#idform').submit();
    });
</script>