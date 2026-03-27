<?php
/**
 * Template Name: Contact Page
 *
 * @package TBDesigned
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
    <div class="section">
        <?php while (have_posts()) : the_post(); ?>

            <header class="page-header text-center mb-12">
                <h1><?php the_title(); ?></h1>
                <?php if (get_the_content()) : ?>
                    <div class="page-intro">
                        <?php the_content(); ?>
                    </div>
                <?php else : ?>
                    <p class="text-lg text-muted">
                        <?php esc_html_e('Let\'s discuss your project. Fill out the form below or reach out directly.', 'tbdesigned'); ?>
                    </p>
                <?php endif; ?>
            </header>

            <div class="grid grid--2">
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2><?php esc_html_e('Send a Message', 'tbdesigned'); ?></h2>

                    <form id="contact-form" class="contact-form" method="post">
                        <div id="form-message" class="form-message" aria-live="polite"></div>

                        <div class="form-group">
                            <label for="contact-name" class="form-label">
                                <?php esc_html_e('Name', 'tbdesigned'); ?> <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="contact-name"
                                name="name"
                                class="form-input"
                                required
                                aria-required="true"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-email" class="form-label">
                                <?php esc_html_e('Email', 'tbdesigned'); ?> <span class="required">*</span>
                            </label>
                            <input
                                type="email"
                                id="contact-email"
                                name="email"
                                class="form-input"
                                required
                                aria-required="true"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-phone" class="form-label">
                                <?php esc_html_e('Phone', 'tbdesigned'); ?>
                            </label>
                            <input
                                type="tel"
                                id="contact-phone"
                                name="phone"
                                class="form-input"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-company" class="form-label">
                                <?php esc_html_e('Company', 'tbdesigned'); ?>
                            </label>
                            <input
                                type="text"
                                id="contact-company"
                                name="company"
                                class="form-input"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-service" class="form-label">
                                <?php esc_html_e('Service Interest', 'tbdesigned'); ?>
                            </label>
                            <select id="contact-service" name="service" class="form-select">
                                <option value=""><?php esc_html_e('Select a service', 'tbdesigned'); ?></option>
                                <option value="web-design"><?php esc_html_e('Web Design', 'tbdesigned'); ?></option>
                                <option value="web-development"><?php esc_html_e('Web Development', 'tbdesigned'); ?></option>
                                <option value="digital-marketing"><?php esc_html_e('Digital Marketing', 'tbdesigned'); ?></option>
                                <option value="maintenance"><?php esc_html_e('Maintenance & Support', 'tbdesigned'); ?></option>
                                <option value="consultation"><?php esc_html_e('Consultation', 'tbdesigned'); ?></option>
                                <option value="other"><?php esc_html_e('Other', 'tbdesigned'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact-budget" class="form-label">
                                <?php esc_html_e('Budget Range', 'tbdesigned'); ?>
                            </label>
                            <select id="contact-budget" name="budget" class="form-select">
                                <option value=""><?php esc_html_e('Select a range', 'tbdesigned'); ?></option>
                                <option value="under-5k"><?php esc_html_e('Under $5,000', 'tbdesigned'); ?></option>
                                <option value="5k-10k"><?php esc_html_e('$5,000 - $10,000', 'tbdesigned'); ?></option>
                                <option value="10k-25k"><?php esc_html_e('$10,000 - $25,000', 'tbdesigned'); ?></option>
                                <option value="25k-plus"><?php esc_html_e('$25,000+', 'tbdesigned'); ?></option>
                                <option value="not-sure"><?php esc_html_e('Not sure yet', 'tbdesigned'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact-message" class="form-label">
                                <?php esc_html_e('Message', 'tbdesigned'); ?> <span class="required">*</span>
                            </label>
                            <textarea
                                id="contact-message"
                                name="message"
                                class="form-textarea"
                                rows="6"
                                required
                                aria-required="true"
                            ></textarea>
                            <span class="form-help">
                                <?php esc_html_e('Tell us about your project and goals', 'tbdesigned'); ?>
                            </span>
                        </div>

                        <!-- Honeypot field -->
                        <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                        <button type="submit" class="btn btn--primary btn--full">
                            <?php esc_html_e('Send Message', 'tbdesigned'); ?>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info">
                    <h2><?php esc_html_e('Get in Touch', 'tbdesigned'); ?></h2>

                    <?php if (get_theme_mod('contact_email')) : ?>
                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <?php echo tbdesigned_icon('mail'); ?>
                            </div>
                            <div class="contact-info__content">
                                <strong><?php esc_html_e('Email', 'tbdesigned'); ?></strong>
                                <p>
                                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>">
                                        <?php echo esc_html(get_theme_mod('contact_email')); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('contact_phone')) : ?>
                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <?php echo tbdesigned_icon('phone'); ?>
                            </div>
                            <div class="contact-info__content">
                                <strong><?php esc_html_e('Phone', 'tbdesigned'); ?></strong>
                                <p>
                                    <a href="tel:<?php echo esc_attr(tbdesigned_format_phone(get_theme_mod('contact_phone'))); ?>">
                                        <?php echo esc_html(get_theme_mod('contact_phone')); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('contact_address')) : ?>
                        <div class="contact-info__item">
                            <div class="contact-info__icon">📍</div>
                            <div class="contact-info__content">
                                <strong><?php esc_html_e('Location', 'tbdesigned'); ?></strong>
                                <p><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="contact-info__cta">
                        <h3><?php esc_html_e('Prefer to chat directly?', 'tbdesigned'); ?></h3>
                        <p><?php esc_html_e('We typically respond within 24 hours during business days.', 'tbdesigned'); ?></p>

                        <?php
                        $social_links = tbdesigned_get_social_links();
                        $filtered_links = array_filter($social_links);
                        
                        if (!empty($filtered_links)) :
                        ?>
                            <div class="social-links mt-4">
                                <?php foreach ($filtered_links as $network => $url) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($network)); ?>">
                                        <?php echo tbdesigned_icon($network); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
