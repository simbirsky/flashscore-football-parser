before-deploy:
	make csfixer
	make test

csfixer:
	./vendor/bin/php-cs-fixer fix --verbose

test:
	./vendor/bin/pest ./tests
