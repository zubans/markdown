1. Run `docker-compose build --pull --no-cache` to build fresh images
2. Run `docker-compose up` (the logs will be displayed in the current shell)
3. Install npm
4. Run npm Install
5. Run npm run build
6. Open `https://localhost/text` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker-compose down --remove-orphans` to stop the Docker containers.

Выбрал ревлизацию
 1. Проверка на оба тега,
 2. Проверка на тег с двумя подчеркиваниями,
 3. Проверка на тег с одним подчеркиванием.

 Это необходимо, чтобы отсечь вариант с путаницей в тегах - если будет два подчеркивания, чтобы не возникла путанница. В принципе, можно было и начать парсить и с двух подчеркиваний, но при варианте с двумя и одним подчеркиванием будет больше итераций.