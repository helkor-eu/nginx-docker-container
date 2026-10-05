<?php
$cs = str_starts_with(strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'cs'), 'cs');
$host = htmlspecialchars($_SERVER['HTTP_HOST'] ?? 'localhost', ENT_QUOTES, 'UTF-8');
$php = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;

$t = $cs ? [
	'status' => 'Webhosting je aktivní',
	'lead' => 'Doména míří na váš webhosting a server odpovídá. Teď už jen stačí nahrát web.',
	'browser' => 'V prohlížeči',
	'browser_text' => 'V administraci otevřete službu, v menu zvolte <b>Soubory</b> a nahrajte web do složky <code>webroot</code>. Soubory nad 1 GiB nahrajte přes FTP.',
	'ftp' => 'Přes FTP klienta',
	'ftp_text' => 'Hodí se na velké soubory a celé složky. Doporučujeme <a href="https://winscp.net/eng/docs/lang:cs">WinSCP</a> nebo <a href="https://filezilla-project.org/">FileZilla</a>, přihlašovací údaje najdete u služby.',
	'here' => 'sem patří váš web',
	'delete' => 'tuto stránku smažte',
	'button' => 'Otevřít administraci',
	'visitor' => 'Jste tu jako návštěvník? Web se teprve připravuje, zkuste to prosím později.',
] : [
	'status' => 'Webhosting is active',
	'lead' => 'The domain points to your webhosting and the server is responding. All that is left is to upload your website.',
	'browser' => 'In the browser',
	'browser_text' => 'Open the service in the dashboard, choose <b>Files</b> in the menu and upload your website into the <code>webroot</code> folder. Files over 1 GiB need to go over FTP.',
	'ftp' => 'With an FTP client',
	'ftp_text' => 'Better for large files and whole folders. We recommend <a href="https://winscp.net/">WinSCP</a> or <a href="https://filezilla-project.org/">FileZilla</a>, the login details are in the service settings.',
	'here' => 'your website goes here',
	'delete' => 'delete this page',
	'button' => 'Open dashboard',
	'visitor' => 'Just visiting? This website is still being set up, please check back later.',
];
?>
<!doctype html>
<html lang="<?= $cs ? 'cs' : 'en' ?>">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="robots" content="noindex" />
		<title><?= $host ?> - Helkor</title>
		<link rel="icon" type="image/png" href="https://helkor.eu/img/favicon.png" />

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
		<link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&amp;family=Ubuntu+Mono&amp;display=swap" rel="stylesheet" />

		<style>
			:root {
				--color-primary: #dc2f28;
				--color-primary-hover: #c92a25;
				--color-primary-dark: #9c1b16;
				--color-background: #18191b;
				--color-background-darker: #121214;
				--color-surface: #202124;
				--color-text-light: #bbb;
				--color-text-muted: #777;
			}

			* {
				box-sizing: border-box;
			}

			body {
				margin: 0;
				min-height: 100vh;
				display: grid;
				place-items: center;
				padding: 1.5rem 1rem;
				background-color: var(--color-background);
				color: white;
				font-family: 'Oxanium', sans-serif;
			}

			.box {
				position: relative;
				width: 100%;
				max-width: 44rem;
				border-radius: 20px;
				padding: 0.25rem;
				overflow: hidden;
				isolation: isolate;
			}
			.box::before,
			.box::after {
				content: '';
				position: absolute;
				z-index: -1;
				top: 50%;
				left: 50%;
				width: 60rem;
				height: 60rem;
				margin: -30rem 0 0 -30rem;
				background-image: conic-gradient(transparent, transparent, transparent, var(--color-primary));
				animation: rotate 8s linear infinite;
			}
			.box::after {
				animation-delay: -4s;
			}

			@keyframes rotate {
				to {
					transform: rotate(360deg);
				}
			}

			@media (prefers-reduced-motion: reduce) {
				.box::before,
				.box::after {
					animation: none;
				}
			}

			.content {
				border-radius: 16px;
				background-color: var(--color-background-darker);
				padding: 2rem;
			}

			.status {
				display: flex;
				align-items: center;
				gap: 0.6rem;
				color: var(--color-text-light);
			}
			.status img {
				width: 1.75rem;
				height: 1.75rem;
			}

			h1 {
				margin: 1.25rem 0 0.5rem;
				font-size: clamp(1.6rem, 6vw, 2.4rem);
				font-weight: 700;
				line-height: 1.15;
				overflow-wrap: anywhere;
			}

			p {
				margin: 0;
				color: var(--color-text-light);
				line-height: 1.6;
			}

			a {
				color: var(--color-primary);
			}
			a:hover {
				color: var(--color-primary-hover);
			}

			b,
			code {
				color: white;
			}
			code {
				font-family: 'Ubuntu Mono', monospace;
				font-size: 1.05em;
			}

			.ways {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 1.5rem;
				margin: 2rem 0 1.5rem;
			}

			h2 {
				margin: 0 0 0.35rem;
				font-size: 1rem;
				font-weight: 600;
			}

			.ways p {
				font-size: 0.92rem;
			}

			.tree {
				margin: 0;
				padding: 1rem 1.25rem;
				border-radius: 12px;
				background-color: var(--color-surface);
				outline: 1px solid rgb(255 255 255 / 0.08);
				font-family: 'Ubuntu Mono', monospace;
				font-size: 0.95rem;
				line-height: 1.6;
				color: var(--color-text-muted);
				overflow-x: auto;
				scrollbar-width: thin;
				scrollbar-color: #424242 transparent;
			}
			.tree .hl {
				color: white;
			}
			.tree .note {
				color: var(--color-primary);
			}

			.actions {
				display: flex;
				flex-wrap: wrap;
				align-items: center;
				justify-content: space-between;
				gap: 1rem;
				margin-top: 1.5rem;
			}

			.button {
				padding: 0.7rem 1.4rem;
				border-radius: 10px;
				background-image: linear-gradient(to bottom right, var(--color-primary), var(--color-primary-dark));
				color: white;
				font-weight: 600;
				text-decoration: none;
			}
			.button:hover {
				color: white;
				filter: brightness(1.15);
			}

			.version {
				color: var(--color-text-muted);
				font-size: 0.9rem;
			}

			.visitor {
				margin-top: 1.75rem;
				padding-top: 1.25rem;
				border-top: 1px solid rgb(255 255 255 / 0.08);
				color: var(--color-text-muted);
				font-size: 0.9rem;
			}

			@media (max-width: 36rem) {
				.content {
					padding: 1.5rem 1.25rem;
				}
				.ways {
					grid-template-columns: 1fr;
				}
				.tree {
					padding: 0.85rem 1rem;
					font-size: 0.78rem;
				}
			}
		</style>
	</head>
	<body>
		<main class="box">
			<div class="content">
				<div class="status">
					<img src="https://helkor.eu/img/favicon.png" alt="Helkor" />
					<?= $t['status'] ?>
				</div>

				<h1><?= $host ?></h1>
				<p><?= $t['lead'] ?></p>

				<div class="ways">
					<div>
						<h2><?= $t['browser'] ?></h2>
						<p><?= $t['browser_text'] ?></p>
					</div>
					<div>
						<h2><?= $t['ftp'] ?></h2>
						<p><?= $t['ftp_text'] ?></p>
					</div>
				</div>

				<pre class="tree">/
├── logs/
├── nginx/
├── php-fpm/
└── <span class="hl">webroot/</span>      <span class="note">← <?= $t['here'] ?></span>
    └── index.php  <span class="note">← <?= $t['delete'] ?></span></pre>

				<div class="actions">
					<a class="button" href="https://dash.helkor.eu"><?= $t['button'] ?></a>
					<span class="version">PHP <?= $php ?></span>
				</div>

				<p class="visitor"><?= $t['visitor'] ?></p>
			</div>
		</main>
	</body>
</html>
