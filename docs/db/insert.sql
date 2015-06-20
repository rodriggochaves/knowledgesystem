# Adiciona os perfies padrões do sistema
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Administrador');
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Professor');
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Aluno');

# Adiciona o admin do sistema
INSERT INTO `knowledgesystem`.`User` (`firstName`, `lastName`, `email`, `password`, `Profile_idProfile`) VALUES ('System', 'Admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', '1');
