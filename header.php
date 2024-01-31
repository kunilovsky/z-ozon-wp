<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zaimozon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Header -->
	<header>
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
					<img src="<?php $custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
					echo $custom_logo__url[0]; ?>" alt="logo" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
					aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
							'container' => false,
							'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
							'add_li_class' => 'nav-item',
							'link_class' => 'nav-link'
						)
					);
					?>
					<div class="nav-social">
						<a href="<?php echo get_option('theme_tg'); ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25"
								fill="none">
								<g clip-path="url(#clip0_1304_703)">
									<path
										d="M12.8875 0.5C6.05326 0.5 0.506592 5.876 0.506592 12.5C0.506592 19.124 6.05326 24.5 12.8875 24.5C19.7218 24.5 25.2685 19.124 25.2685 12.5C25.2685 5.876 19.7218 0.5 12.8875 0.5ZM18.6323 8.66C18.4466 10.556 17.6418 15.164 17.2333 17.288C17.0599 18.188 16.7133 18.488 16.3914 18.524C15.6733 18.584 15.1285 18.068 14.4352 17.624C13.3456 16.928 12.7266 16.496 11.6742 15.824C10.4485 15.044 11.2409 14.612 11.9466 13.916C12.1323 13.736 15.3018 10.94 15.3637 10.688C15.3723 10.6498 15.3712 10.6102 15.3604 10.5726C15.3496 10.5349 15.3295 10.5004 15.3018 10.472C15.2275 10.412 15.1285 10.436 15.0418 10.448C14.9304 10.472 13.1971 11.588 9.81707 13.796C9.32183 14.12 8.87612 14.288 8.47992 14.276C8.03421 14.264 7.19231 14.036 6.56088 13.832C5.78088 13.592 5.17421 13.46 5.22373 13.04C5.2485 12.824 5.55802 12.608 6.13993 12.38C9.75516 10.856 12.1571 9.848 13.358 9.368C16.7999 7.976 17.5056 7.736 17.9761 7.736C18.0752 7.736 18.3104 7.76 18.459 7.88C18.5828 7.976 18.6199 8.108 18.6323 8.204C18.6199 8.276 18.6447 8.492 18.6323 8.66Z"
										fill="#0C064D" />
								</g>
								<defs>
									<clipPath id="clip0_1304_703">
										<rect width="26" height="24" fill="white" transform="translate(0 0.5)" />
									</clipPath>
								</defs>
							</svg>
						</a>
						<a href="<?php echo get_option('theme_dz'); ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
								fill="none">
								<g clip-path="url(#clip0_1304_705)">
									<mask id="mask0_1304_705" style="mask-type: luminance" maskUnits="userSpaceOnUse"
										x="0" y="0" width="24" height="25">
										<path
											d="M24 12.5C24 5.87258 18.6274 0.5 12 0.5C5.37258 0.5 0 5.87258 0 12.5C0 19.1274 5.37258 24.5 12 24.5C18.6274 24.5 24 19.1274 24 12.5Z"
											fill="white" />
									</mask>
									<g mask="url(#mask0_1304_705)">
										<path
											d="M24 12.5C24 5.87258 18.6274 0.5 12 0.5C5.37258 0.5 0 5.87258 0 12.5C0 19.1274 5.37258 24.5 12 24.5C18.6274 24.5 24 19.1274 24 12.5Z"
											fill="#0C064D" />
										<path
											d="M19.5908 12.5C15.4487 12.5 12.0908 16.0817 12.0908 20.5C12.0908 16.0817 8.73297 12.5 4.59082 12.5C8.73297 12.5 12.0908 8.91829 12.0908 4.5C12.0908 8.91829 15.4487 12.5 19.5908 12.5Z"
											fill="white" />
									</g>
								</g>
								<defs>
									<clipPath id="clip0_1304_705">
										<rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
									</clipPath>
								</defs>
							</svg>
						</a>
						<a href="<?php echo get_option('theme_yt'); ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
								fill="none">
								<rect y="0.5" width="24" height="24" rx="12" fill="#0C064D" />
								<path
									d="M20.201 8.1772C20.3198 7.78651 20.201 7.5 19.6394 7.5H17.7789C17.3056 7.5 17.0892 7.74786 16.9705 8.02008C16.9705 8.02008 16.0245 10.3046 14.6841 11.7858C14.2514 12.2169 14.0538 12.353 13.8179 12.353C13.7 12.353 13.5286 12.2169 13.5286 11.8262V8.1772C13.5286 7.70837 13.392 7.5 12.9975 7.5H10.0741C9.77883 7.5 9.60067 7.71677 9.60067 7.92346C9.60067 8.36708 10.2709 8.46959 10.3396 9.71979V12.4319C10.3396 13.026 10.2319 13.1343 9.99431 13.1343C9.36397 13.1343 7.83012 10.8415 6.91982 8.21669C6.74251 7.70669 6.56351 7.50084 6.08842 7.50084H4.22879C3.69687 7.50084 3.59082 7.7487 3.59082 8.02092C3.59082 8.50991 4.22116 10.9297 6.52703 14.13C8.06427 16.3153 10.2285 17.5 12.2001 17.5C13.3818 17.5 13.5278 17.237 13.5278 16.7833V15.1315C13.5278 14.6055 13.6406 14.4997 14.0147 14.4997C14.2896 14.4997 14.763 14.6375 15.8667 15.6902C17.1274 16.9387 17.3361 17.4992 18.0445 17.4992H19.9041C20.4352 17.4992 20.7007 17.2362 20.548 16.7169C20.3809 16.2002 19.7786 15.4482 18.9794 14.5585C18.545 14.051 17.896 13.5049 17.6984 13.2318C17.4226 12.8798 17.5024 12.7243 17.6984 12.4118C17.6992 12.4126 19.9652 9.25181 20.201 8.1772Z"
									fill="white" />
							</svg>
						</a>
						<button class="btn nav-btn" data-bs-toggle="modal" data-bs-target="#mainModal">
							Оставить заявку
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!-- /Header -->