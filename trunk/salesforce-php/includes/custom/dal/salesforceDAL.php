<?php
/**
 *
 * @author uishaq
 */
class SalesforceDAL
{
    protected $sfClient;
    protected $query;
    public $params;
    public $sfObject;
    public $totalRecordsCount;
    public $pagedRows;

    protected function getQueryStringValues($query_string)
    {
        $query  = explode('&', $query_string);
        $params = array();

        foreach( $query as $param )
        {
            list($name, $value) = explode('=', $param);
            $params[urldecode($name)][] = urldecode($value);
        }

        return $params;
    }
    
    public function appendColumns($query, $column_names, $table)
    {
        $query .= " ";

        if(is_array($column_names))
        {
            foreach($column_names as $column)
            {
                $query .= $column;
                $query .= ",";
            }

            $query = rtrim($query, ',');
        }
        else
        {
            $query .= $column_names;
        }

        $query .= " FROM ";
        $query .= $table;

        return $query;
    }

    public function appendConditions($query, $column_names, $value_list)
    {
        if(count($column_names) == count($value_list))
        {
            $query .= " WHERE ";

            if(is_array($column_names))
            {
                for($i = 0; $i < count($column_names); $i++)
                {
                    $query .= $column_names[$i];
                    $query .= "=";
                    $query .= "'" . $value_list[$i] . "'";

                    if($i < count($column_names) - 1)
                    {
                        $query .= " AND ";
                    }
                }
            }
            else
            {
                $query .= $column_names;
                $query .= "=";
                $query .= "'" . $value_list . "'";
            }
        }

        return $query;
    }

    public function appendSearching($query, $column_names, $keywords)
    {
        if(is_array($column_names) && is_array($keywords) && count($column_names) == count($keywords))
        {
            $where_pos = strpos($query, "WHERE");

            if($where_pos != FALSE)     //query already contains a WHERE clause
            {
                $before_where = substr($query, 0, $where_pos);
                $after_where = substr($query, $where_pos + 5);      //because the word WHERE is 5 charaters

                $like_clause = " WHERE ";

                for($i = 0; $i < count($column_names); $i++)
                {
                    $keywords[$i] = str_replace("*", "%", $keywords[$i]);
                    $keywords[$i] = str_replace("?", "_", $keywords[$i]);

                    $like_clause .= $column_names[$i];
                    $like_clause .= " LIKE ";
                    $like_clause .= "'" . $keywords[$i] . "'";

                    if($i < count($column_names) - 1)
                    {
                        $query .= " OR ";
                    }
                }

                $query = $before_where . $like_clause . " AND " . $after_where;
            }
            else
            {
                $query .= " WHERE ";

                for($i = 0; $i < count($column_names); $i++)
                {
                    $keywords[$i] = str_replace("*", "%", $keywords[$i]);
                    $keywords[$i] = str_replace("?", "_", $keywords[$i]);

                    $query .= $column_names[$i];
                    $query .= " LIKE ";
                    $query .= "'" . $keywords[$i] . "'";

                    if($i < count($column_names) - 1)
                    {
                        $query .= " OR ";
                    }
                }

                $query = rtrim($query, ',');
            }
        }

        return $query;
    }

    public function appendSorting($query, $column_names, $order="ASC")
    {
        if(count($column_names) > 0)
        {
            $query .= " ORDER BY ";

            if(is_array($column_names))
            {
                if(is_array($order) && count($column_names) == count($order))
                {
                    for($i = 0; $i < count($column_names); $i++)
                    {
                        $query .= $column_names[$i];
                        $query .= " ";
                        $query .= $order[i];
                        $query .= ",";
                    }

                    $query = rtrim($query, ',');
                }
                else
                {
                    foreach($column_names as $column)
                    {
                        $query .= $column;
                        $query .= ",";
                    }

                    $query = rtrim($query, ',');

                    //$order may still be an array but not with same count as columns
                    if(!is_array($order))
                    {
                        $query .= " ";
                        $query .= $order;
                    }
                }
            }
            else
            {
                $query .= $column_names;

                if(!is_array($order))
                {
                    $query .= " ";
                    $query .= $order;
                }
            }
        }

        return $query;
    }

    public function appendLimit($query, $startRecord, $recordCount)
    {
        if($recordCount > 0)
        {
            $query .= " LIMIT ";
            $query .= $startRecord - 1;     //since mySQL uses 0-based rec index
            $query .= ", ";
            $query .= $recordCount;
        }

        return $query;
    }

    protected function runSelectQuery()
    {
        $res = $this->sfClient->query($this->query);

        return $res;
    }

    protected function getTotalCount()
    {
        $result = $this->runSelectQuery();

        if(!is_null($result->records) && is_array($result->records))
        {
            $this->totalRecordsCount = count($result->records);
        }
        else
        {
            $this->totalRecordsCount = 0;
        }
    }

    protected function getPagedRows($result, $startRow, $numberOfRows)
    {
        if(!is_null($result->records) && is_array($result->records))
        {
            $startRow = $startRow > 1 ? $startRow - 1 : 0;

            if($startRow > count($result->records))
            {
                $startRow = count($result->records) - 1;
            }

            if ($startRow + $numberOfRows >= count($result->records))
            {
                $numberOfRows = count($result->records) - $startRow;
            }

            $result->records = array_slice($result->records, $startRow, $numberOfRows);

            $this->pagedRows = count($result->records);
        }
        else
        {
            $this->pagedRows = 0;
        }

        return $result;
    }
}
?>
