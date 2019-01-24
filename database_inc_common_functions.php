<?php
define('DEFAULT_STATUS', 'ordered');
/**
 * 
 * @return array [status values]
 */
function getStatusValues()
{
	return array('unassigned', 'ordered', 'sent', 'canceled');
}

/**
 * 
 * @param string $selectedStatus
 * @return string HTML SELECT
 */
function buildStatusOptions($selectedStatus = DEFAULT_STATUS)
{
	$statusValues = getStatusValues();
	$html = '<select name="status">';
	foreach ($statusValues as $value) {
		if ($value == $selectedStatus) {
			$selected = ' selected';
		} else {
			$selected = '';
		}
		$html .= '<option value="' . $value . '"' .$selected . '>' . $value . '</option>';
	}
	$html .= '</select>';
	return $html;
}

function getStaticOrders($num = 1)
{
	//['id' => sequential int, 'order_status' => getStatusValues(RAND), 'amount' => RAND float]
	$data         = [];
	$statusValues = getStatusValues();
	$max          = count($statusValues) - 1;
	for ($id = 1; $id <= $num; $id++) {
		$status = $statusValues[rand(0, $max)];
		$amount = rand(1, 99999);
		$data[] = ['id' => $id, 'order_status' => $status, 'amount' => $amount];
	}
	return $data;
}

function getConnection(&$link = NULL)
{

    static $link = NULL;
	
	if ($link === NULL) {
		$link = mysqli_connect('localhost:3307', 'lightmvcuser', 'testpass', 'lightmvctestdb');
	}
	return $link;	
}

function closeConnection(&$link)
{
    if (!empty($link)) {
        $link = NULL;
        return FALSE;
    } else {
        mysqli_close($link);
        return TRUE;
    }
}

function getQuote()
{
	return "'";
}

// SELECT `id`,`firstname`,`lastname` FROM `customers` WHERE x=y 
// $where = [key = column name, value = data]
// $andOr = AND | OR
function getCustomers(array $where = array(), $andOr = 'AND')
{
	$query = 'SELECT `id`,`firstname`,`lastname` FROM `customers`';
	if ($where) {
		$query .= ' WHERE ';
		foreach ($where as $column => $value) {
			$query .= $column . ' = ' . getQuote() . $value . getQuote() . ' ' . $andOr;
		}
		$query = substr($query, 0, -(strlen($andOr)));
	}
    $link = getConnection();
	$result = mysqli_query($link, $query);
	$fetchedResults = mysqli_fetch_all($result);
    closeConnection($link);

	return $fetchedResults;
}
