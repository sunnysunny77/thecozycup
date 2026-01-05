<?php

    $title      = $args["title"] ?? "";
    $post_id    = $args["post_id"] ?? "";

?>

<form class="d-flex flex-wrap" id="product_form">
    <fieldset class="row align-self-start justify-content-center">
        <legend class="col-48 py-6 pe-6 ps-8 mb-8">
            <?php echo $title; ?>
        </legend>
        <input type="hidden" name="title" id="title" value="<?php echo $title; ?>" />
        <input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>" />
        <label class="col-48 row px-6" for="quantity"><span class="d-block">Quantity:</span>
            <input class="col-48 col-xl-19" type="number" name="quantity" id="quantity" value="1" min="1" step="1" autocomplete="off" required>
        </label>
        <label class="col-48 row px-6" for="address"><span class="d-block">Address:</span>
            <input class="col-48 col-xl-44" type="text" name="address" id="address" autocomplete="on" required>
        </label>
        <label class="col-48 col-xl-24 row px-6" for="name">Enter your name:
            <input class="col-48 col-xl-40" type="text" name="name" id="name" autocomplete="on" required>
        </label>
        <label class="col-48 col-xl-24 row px-6" for="email">Enter your email:
            <input class="col-48 col-xl-40" type="email" name="email" id="email" autocomplete="on" required>
        </label>
        <label class="col-48 row mt-9 px-6" for="message">Enter your message:
            <textarea class="col-48" name="message" id="message" maxlength="1000" rows="6" required></textarea>
        </label>    
    </fieldset>
    <div id="response" class="d-flex justify-content-center align-self-end w-100">
    </div>
    <div class="d-flex justify-content-end align-self-end w-100">
        <button type="submit"><span class="button-icon">Send<span></button>
    </div>
</form>