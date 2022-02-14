<div <?php echo get_block_wrapper_attributes(); ?>>
    <div class="grnhse_prspct_cta">
        <?php echo wp_kses_post($content) ?>
    </div>
    <div class="grnhse_prspct">
        <div class="grnhse_prspct__container">
        <button class="modal-close"><span></span></button>
        <form id="ghpros-form" class="ghpros-form" enctype="multipart/form-data" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">
        <?php wp_nonce_field( 'ghpros_create_applicant', 'ghpros_nonce' ); ?>
            <div class="ghpros-form__name">
            <div class="double-field">
                <label for="first_name">First Name <span class="required">*</span></label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required>
            </div>
            <div class="double-field">
                <label for="last_name">Last Name <span class="required">*</span></label>
                <input id="last_name" name="last_name" type="text" autocomplete="family-name" required>
            </div>
            </div>
            <div class="field">
                <label for="email">Email <span class="required">*</span></label>
                <input id="email" name="email" type="email" autocomplete="email" required>
            </div>
            <div class="field">
                <label for="phone">Phone <span class="required">*</span></label>
                <input id="phone" name="phone" type="text" autocomplete="tel" required>
            </div>
            <div class="field">
                <label for="website">Website URL</label>
                <input type="url" name="website" id="website">
            </div>
            <div class="field">
                <label for="linkedin">LinkedIn Profile</label>
                <input type="url" name="linkedin" id="linkedin">
            </div>
            <div class="field">
                <label for="cover_letter">Cover Letter</label>
                <input type="file" accept=".pdf, .doc, .docx, .txt, .rtf" name="cover_letter" id="cover_letter">
            </div>
            <div class="field">
                <label for="resume">Resume</label>
                <input type="file" accept=".pdf, .doc, .docx, .txt, .rtf" name="resume" id="resume">
            </div>
            <div class="ghpros-form__submit">
                <input type="hidden" name="action" value="ghpros_create_applicant">
                <input class="wp-block-button__link" type="submit" value="Submit">
            </div>
        </form>
        </div>
    </div>
</div>