<template>
    <div class="dashboard-editor-container">
        <el-row :gutter="20"> </el-row>
        <!-- 系统消息提示 -->
        <MessageDialog :messageList="this.messageList" />
    </div>
</template>
<script>
import { setStore, getStore, removeStore } from "@/utils/store";
import MessageDialog from "./components/MessageDialog";
import NoticePanel from "./components/NoticePanel";
import PanelGroup from "./components/PanelGroup";
import OperateLog from "./components/OperateLog";
import { getHomeData } from "@/api/common/home";
const defaultListQuery = {
    cur_page: 1,
    page_size: 20,
};
export default {
    name: "Home",
    components: {
        PanelGroup,
        NoticePanel,
        MessageDialog,
        OperateLog,
    },
    data() {
        return {
            listQuery: Object.assign({}, defaultListQuery),
            adviceDialogVisible: false,
            noticeDialogVisible: false,
            dataSummary: [],
            operateLog: {
                list: [],
                total: 0,
            },
            noticeList: [],
            operateLog: [],
            messageList: [],
        };
    },
    created() {
        this.getHomeData();
    },
    methods: {
        handleSetLineChartData(type) {
            this.lineChartData = lineChartData[type];
        },
        getHomeData() {
            getHomeData(this.listQuery).then((response) => {
                if (response.code == 200) {
                    const data = response.data;
                    this.dataSummary = data.dataSummary;
                    this.operateLog = data.operate_log;
                    this.noticeList = data.notice_list;
                    const clearStorageList = data.clearStorageList;
                    this.clearStorage(clearStorageList);
                }
            });
        },
        clearStorage(storageList) {
            for (let i in storageList) {
                removeStore({ name: storageList[i] });
            }
        },
    },
};
</script>
<style lang="scss" scoped>
.dashboard-editor-container {
    padding: 32px;
    background-color: rgb(240, 242, 245);
    position: relative;

    .github-corner {
        position: absolute;
        top: 0px;
        border: 0;
        right: 0;
    }

    .chart-wrapper {
        background: #fff;
    }
}
</style>
