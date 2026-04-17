#!/bin/bash

working_dir="/home/dh_qi7i23/viviofthevoid.com/wp-content/themes"
theme="vivi-of-the-void"
host="dreamhost"

npm run bundle

if [ ! -f "../$theme.zip" ]; then
	echo '[-] Missing theme zip file'
	exit 1
fi

rsync -v "../$theme.zip" "$host:/$working_dir/"

ssh $host /bin/bash << EOF
	cd "${working_dir}"
	
	if [ -d "${theme}.bak" ]; then
		rm -rf "${theme}.bak"
	fi

	mv $theme "${theme}.bak"

	unzip "${theme}.zip"

	find $theme -type d -exec chmod 755 {} +
	find $theme -type f -exec chmod 644 {} +

	rm "${theme}.zip"
EOF

echo '[+] Deploy complete'
exit 0
