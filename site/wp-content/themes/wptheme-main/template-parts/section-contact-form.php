<form class="d-flex flex-wrap" id="contact_form">
    <fieldset class="row align-self-start justify-content-center">
        <legend class="col-48 py-6 pe-6 ps-8 mb-8">
            Enquire below
        </legend>
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
        <input type="submit" value="Send">
    </div>
</form>