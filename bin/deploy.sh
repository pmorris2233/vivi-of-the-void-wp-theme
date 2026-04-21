#!/usr/bin/env bash

if [ ! -f ".env" ]; then
	echo "[-] Missing config: '.env' not found"
	exit 1
fi

source .env

npm run bundle

if [ ! -f "../${votv_config[theme]}.zip" ]; then
	echo '[-] Missing theme zip file'
	exit 1
fi

remote_uri="${votv_config[host]}:/${votv_config[remote_dir]}/wp-content/themes"

rsync -v "../${votv_config[theme]}.zip" "$remote_uri"

ssh ${votv_config[host]} /bin/bash << EOF
	cd "${votv_config[remote_dir]}/wp-content/themes"
	
	if [ -d "${votv_config[theme]}.bak" ]; then
		rm -rf "${votv_config[theme]}.bak"
	fi

	mv ${votv_config[theme]} "${votv_config[theme]}.bak"
	unzip "${votv_config[theme]}.zip"
	find ${votv_config[theme]} -type d -exec chmod 755 {} +
	find ${votv_config[theme]} -type f -exec chmod 644 {} +
	rm "${votv_config[theme]}.zip"
EOF

echo '[+] Deploy complete'
exit 0
