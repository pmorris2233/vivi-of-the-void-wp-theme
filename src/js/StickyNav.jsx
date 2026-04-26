import React from 'react';
import { useState, useEffect } from 'react';

export default function StickyNav () {
	const [isSticky, setSticky] = useState(false);
	let lastScrollY = window.scrollY;

	useEffect(() => {
		window.addEventListener('scroll', stickNavbar);

		return () => {
			window.removeEventListener('scroll', stickNavbar);
		}
	});

	const stickNavbar = () => {
		if (window !== undefined) {
			const scrollY = window.scrollY;

			if (scrollY > lastScrollY) {
				if (scrollY > 275) {
					setSticky(true);
				} else {
					setSticky(false);
				}
			} else {
				if (scrollY <= 1) {
					setSticky(false);
				}
			}

			lastScrollY = scrollY;
		}
	};

	const navClassNames = () => {
		const classNames = ['site-header'];

		if (isSticky) {
			classNames.push('site-header--sticky');
		}

		return classNames.join(' ');
	}

	return (
		<header 
			id="masthead"
			className={ navClassNames() } >
			<div className="site-header-inner">
				<div className="site-branding">
					<span className="site-title">
						<a href="/" rel="home">Vivi of the Void</a>
					</span>
				</div>
			</div>
		</header>
	);
}
