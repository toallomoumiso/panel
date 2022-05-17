<?php

class Database
{
    /**
     * Database driver
     *
     * @var string
     */
    public $DBDriver = 'MySQLi';

    /**
     * MySQLi constant
     *
     * For unbuffered queries use `MYSQLI_USE_RESULT`.
     *
     * Default mode for buffered queries uses `MYSQLI_STORE_RESULT`.
     *
     * @var int
     */
    public $resultMode = MYSQLI_STORE_RESULT;
	
	/**
	 * Database Configuration
	 */
    private $site_db = "asilzade";
    private $site_host = "localhost";
    private $site_user = "root";
    private $site_password = "05355452521";
  
    public $luna = null;
	
    /**
     * The default database connection.
     *
     * @var array
     */
    public function connect()
    {
        try {
            $this->luna = new mysqli
			(
			$this->site_host,
			$this->site_user,
			$this->site_password,
			$this->site_db
			);
		
		} catch (mysqli_sql_exception $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
		
		if ($luna -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}
		else
		{
		  echo '<br>Site Bağlantısı Başarılı';
		}
        return $this->luna;
    }
	
    /**
     * Returns the last error code and message.
     * Must return this format: ['code' => string|int, 'message' => string]
     * intval(code) === 0 means "no error".
     *
     * @return array<string, int|string>
     */
    public function error(): array
    {
        if (! empty($this->mysqli->connect_errno)) {
            return [
                'code'    => $this->mysqli->connect_errno,
                'message' => $this->mysqli->connect_error,
            ];
        }

        return [
            'code'    => $this->connID->errno,
            'message' => $this->connID->error,
        ];
    }
	
    /**
     * Returns a string containing the version of the database being used.
     */
	 
    public function getVersion(): string
    {
        if (isset($this->dataCache['version'])) {
            return $this->dataCache['version'];
        }

        if (empty($this->mysqli)) {
            $this->initialize();
        }

        return $this->dataCache['version'] = $this->mysqli->server_info;
    }
}
