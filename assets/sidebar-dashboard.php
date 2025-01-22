<body onload="identificarBotao()">
    <nav id="sidebar">
    
        <div id="sidebar_content">
            <div id="user">
                <img id="user_avatar" src="../images/logo.jpg">
        
            </div>
        
            <ul id="side_items">
                <li id="pedidos.php" class="side-item">
                    <a href="pedidos.php">
                        <i class="bi bi-tags me-1"></i>
                        <span class="item-description">
                            Pedidos
                        </span>
                    </a>
                </li>
        
                <li id="produtos.php" class="side-item">
                    <a href="produtos.php">
                        <i class="bi bi-cart2"></i>
                        <span class="item-description">
                            Produtos
                        </span>
                    </a>
                </li>
        
                <li id="contatos.php" class="side-item">
                    <a href="contatos.php">
                        <i class="bi bi-person-lines-fill"></i>
                        <span class="item-description">
                            Contatos
                        </span>
                    </a>
                </li>
        
                <li id="mensagens.php" class="side-item">
                    <a href="mensagens.php">
                        <i class="bi bi-chat-dots"></i>
                        <span class="item-description">
                            Mensagens
                        </span>
                    </a>
                </li>
            </ul>
        
            <button id="open_btn">
                <i id="open_btn_icon" class="bi bi-chevron-right"></i>
            </button>
        </div>
        
        <a href="../assets/logout.php" id="logout">
            <button id="logout_btn">
                <i class="bi bi-box-arrow-left"></i>
                <span class="item-description">
                    Logout
                </span>
            </button>
        </a>
    
    </nav>
</body>