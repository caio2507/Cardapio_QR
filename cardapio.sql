/*SQL do cardapio*/

CREATE TABLE itens_cardapio (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(100) NOT NULL
);

 /*SQL dos pedidos*/
 
CREATE TABLE pedidos (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_id INT(11) NOT NULL,
    quantidade INT(11) NOT NULL DEFAULT 1,
    data_pedido DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) NOT NULL DEFAULT 'Pendente',
    FOREIGN KEY (item_id) REFERENCES itens_cardapio(id)
);