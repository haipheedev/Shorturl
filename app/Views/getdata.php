
<main id="main" data-aos="fade-up">
    <section class="inner-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card-body row no-gutters align-items-center text-center">
                       
                        <div class="col-12">
                            <h2>Paste the URL to be shortened</h2>
                            <div>
                            <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=<?=$shorturl['fullurl']?>" title="<?=$shorturl['fullurl']?>" />
                            </div>
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="text"  id="fullurl" name="fullurl" 
                            value="<?=base_url()?>/<?=$shorturl['shorturl']?>" >
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="button" onclick="myFunction()">Copy Shorten URL</button>
                        </div>
                        <br><br>
                        <div class="col-12">
                            <a href="<?=base_url()?>/<?=$shorturl['shorturl']?>" target="_blank" class="btn btn-sm btn-primary">
                                Open to Full URL
                            </a>
                        </div>
                        <br><br>
                        <div class="col">
                            <p>View :: <?=$shorturl['view']?></p>
                        </div>

                        <!--end of col-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("fullurl");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
    }
</script>