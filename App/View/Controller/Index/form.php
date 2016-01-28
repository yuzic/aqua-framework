<?php
    use \Aqua\Base\Request;
    use \App\Base\Helper\Html;
    use \App\Base\Helper\Protection;
?>
<h3> Send message gust book </h3>

<?php if (!empty($notify['message'])) { ?>
    <div style="color: green"><?=$notify['message'];?> </div>
<?php } ?>
<form method="post" id="contact-form" style="margin-left: 10px">
    <input type="hidden" name="comment" value="1">
    <input type="hidden" name="csrf_token" value="<?=Protection::getCsrfToken();?>">
    <div class="control-group">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
            <input name="name" type="text" id="name" placeholder="Your name" required value="<?=Html::escape(Request::post('name'));?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input name="email" type="email" id="email" placeholder="Your email" required value="<?=Html::escape(Request::post('email'));?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="homepage">Home page</label>
        <div class="controls">
            <input name="homepage" id="homepage" type="text"  placeholder="Your homepage"  value="<?=Html::escape(Request::post('homepage'));?>">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="captcha">captcha (Сколько букв с слове "три")</label>
        <div class="controls">
            <input name="captcha" id="captcha" type="text" placeholder="captcha" required value="<?=Html::escape(Request::post('captcha'));?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="message">Message</label>
        <div class="controls">
            <textarea name="message" required cols="40" id="message" placeholder="You Message" rows="10"><?=Html::escape(Request::post('message'));?></textarea>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Submit Message</button>
        <button type="reset" class="btn">Cancel</button>
    </div>

    <?php if (!empty($notify['error'])) { ?>
        <div style="color: red"><?=$notify['error'];?> </div>
    <?php } ?>
</form>

<script>
    $(document).ready(function () {

        $('#contact-form').validate({
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    minlength: 2,
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                element.text('OK!').addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
            }
        });

    });
</script>