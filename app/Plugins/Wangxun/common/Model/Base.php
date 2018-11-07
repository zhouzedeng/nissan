<?php
namespace Wangxun\Common\Model;

use Illuminate\Support\Facades\DB;

/**
 * 基类
 * Class Base
 * @package App\Model
 * @author Zed
 * @since 2018-10-30
 */
class Base
{
    const ID = 'id';
    const TABLE = 'base';
    /**
     * 新增记录
     * @param array $data
     * @return int 新增记录行的id
     * @author Zed
     * @since 2018-10-30
     */
    public static function add($data)
    {
        $id = DB::table(self::getTable())->insertGetId($data);
        return $id;
    }

    /**
     * 批量新增列表
     * @param array $data
     * @return int  插入的行数
     * @author Zed
     * @since 2018-10-30
     */
    public static function addList($data)
    {
        // 定义变量
        $cnt = 0;

        // 校正参数
        $list = array_chunk($data, 1000);

        // 循环插入子列表
        foreach ($list as $v) {
            $result = DB::table(self::getTable())->insert($v);
            if (!$result) {
                return 0;
            }
            $cnt += $result;
        }

        // Success
        return $cnt;
    }

    /**
     * 删除记录（列表），根据ID
     * @param int|array $id
     * @param int|null $limit
     * @param bool $hard
     * @return int 影响的行数
     * @author Zed
     * @since 2018-10-30
     */
    public static function delById($id)
    {
        // 定义变量
        $cnt = 0;

        // 校正参数
        $id_list = is_array($id)? $id : [$id];
        $id_list = array_chunk($id_list, 1000);

        // 循环删除子列表
        foreach ($id_list as $v) {
            $query = DB::table(self::getTable())->whereIn(self::getId(), $v);
            $result = $query->delete();
            $cnt += $result;
        }
        // Success
        return $cnt;
    }

    /**
     * 查询第一条记录
     * @author Zed
     * @since 2018-10-30
     */
    public static function getOneByParam($where = [], $field = '*')
    {
        $query = DB::table(self::getTable());
        $where && $query->where($where);
        $field && $query->select($field);
        $result = $query->first();
        return $result;
    }

    /**
     * 查询总数，通过参数
     * @author Zed
     * @since 2018-10-30
     */
    public static function getCntByParam($where)
    {
        $query = DB::table(self::getTable());
        $where && $query->where($where);
        $result = $query->count();
        return $result;
    }

    /**
     * 获取列表
     */
    public static function getListByParam($where = array(), $page = null, $pagesize = null, $field = null, $order = null)
    {
        $query = DB::table(self::getTable());
        $where && $query->where($where);
        $field && $query->select($field);
        $order && $query->orderBy($order[0], $order[1]);
        !is_null($page) &&  $query->offset(($page - 1) * $pagesize)->limit($pagesize);
        $result = $query->get()->all();
        return $result;
    }

    /**
     * 更新列表，根据ID
     * @author Zed
     * @since 2018-10-30
     */
    public static function updateById($data, $id)
    {
        $cnt = 0;
        $id_list = is_array($id)? $id : [$id];
        $id_list = array_chunk($id_list, 1000);
        foreach ($id_list as $v) {
            $query = DB::table(self::getTable())
                ->whereIn(self::getId(), $v);
            $result = $query->update($data);
            $cnt += $result;
        }
        return $cnt;
    }

    /**
     * 获取表主键
     * @return string
     * @author Zed
     * @since 2018-10-30
     */
    private static function getId()
    {
        $full_class_name = get_called_class();
        return $full_class_name::ID;
    }

    /**
     * 获取表名
     * @return string
     * @author Zed
     * @since 2018-10-30
     */
    private static function getTable()
    {
        $full_class_name = get_called_class();
        return $full_class_name::TABLE;
    }
    /**
     * 获取列表
     */
    public static function getListByParamIn($where = array(),$whereIn = array(), $page = null, $pagesize = null, $field = null, $order = null)
    {
        $query = DB::table(self::getTable());
        $where && $query->where($where);
        $whereIn && $query->whereIn(self::getId(),$whereIn);
        $field && $query->select($field);
        $order && $query->orderBy($order[0], $order[1]);
        !is_null($page) &&  $query->offset(($page - 1) * $pagesize)->limit($pagesize);
        $result = $query->get()->all();
        return $result;
    }
}
