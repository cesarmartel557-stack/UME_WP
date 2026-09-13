
<div class="expansion-chat chat-container">
    <!-- Ventana de Chat -->
    <transition name="el-zoom-in-bottom">
      <el-card v-show="expansion_drawer_msg" class="chat-window" shadow="always">
        <div slot="header" class="chat-header">
          <span>Soporte en línea</span>
          <el-button type="text" icon="el-icon-close" @click="expansion_drawer_msg = false"></el-button>
        </div>
        <div class="chat-content">
          <!-- Aquí van tus mensajes -->
          <p>¿En qué podemos ayudarte?</p>
        </div>
        <div class="chat-footer">
          <!--<el-input placeholder="Escribe un mensaje..." v-model="message">
            <el-button slot="append" icon="el-icon-send"></el-button>
          </el-input> -->
          <el-button type="text" icon="el-icon-close" @click="expansion_drawer_msg = false"></el-button>
        </div>
      </el-card>
    </transition>

    <!-- Botón Flotante -->

    <el-button
      type="primary"
      icon="el-icon-chat-dot-round"
      circle
      class="chat-button"
      @click="expansion_drawer_msg = !expansion_drawer_msg"
    ></el-button>
  
</div>

<style scoped>
/* Expanion CHAT */
.expansion-chat.chat-container {
  position: fixed;
  right: 20px;
  bottom: 20px;
  z-index: 2000; /* Asegura que esté por encima de otros elementos */
}

.expansion-chat .chat-button {
  width: 60px;
  height: 60px;
  font-size: 24px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.expansion-chat .chat-window {
  width: 350px;
  margin-bottom: 15px;
  border-radius: 12px;
}

.expansion-chat .chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.expansion-chat .chat-content {
  height: 300px;
  overflow-y: auto;
}
</style>