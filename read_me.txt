Site exibe testes com perguntas sobre desenvolvimento Web e apenas deixa voce submeter suas respostas e conferir o resultado se voce estiver logado.

Rodando com MAMP ou WAMP

Coloque como pasta raiz em Preferencias 233-cwk-4

Setar uma base de dados “users_233-cwk-4” no phpmyadmin do contrario não sera possível se logar  pois não existira conexão com a base de dados.

Na base de dados criar uma tabela “users” com campos “username” e “password”

Inserir pelo menos uma entrada de username e password

Na base de dados criada, inserir duas novas tabelas
Test : tabela que vai listar numero das questões no teste

test_id 	|	question_id

INSERT INTO `test` (`test_id`, `question_id`) VALUES ('1', '1'), ('1', '2');

INSERT INTO `test` (`test_id`, `question_id`) VALUES ('2', '2'), ('2', '3');

INSERT INTO `test` (`test_id`, `question_id`) VALUES ('3', '3'), ('3', '4'), ('3','5');


Questions : tabela contendo numero da pergunta, pergunta, alternativas e alternativa correta

question_id	|	question	|	a	|	b	|	c	|	d	|	correct_answer

INSERT INTO `questions` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`) VALUES ('1', 'Qual era a versão atual do HTML em 2016?', '4', '5', '6', '7', 'b');

INSERT INTO `questions` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`) VALUES ('2', 'Qual dessas tecnologias foca em design para paginas HTML?', 'JavaScript', 'C#', 'Java', 'CSS', 'd');

INSERT INTO `questions` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`) VALUES ('3', 'O que são cookies?', 'Informações armazenadas localmente pelo browser em referencia a um endereço ', 'Unidade monetaria usada na internet', 'Ferramenta para executar scripts', 'Nenhuma das anteriores', 'a');

INSERT INTO `questions` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`) VALUES ('4', 'O que significa a sigla PHP?', 'Hypertext Preprocessor', 'Pre Historia Popular', 'Primeiro Harry Potter', 'Post Hypertext', 'a');

INSERT INTO `questions` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`) VALUES ('5', 'Qual tag HTML é usada para criar links?', 'li', 'src=pagina.html', 'ol', 'a href = "pagina.html"', 'd');


