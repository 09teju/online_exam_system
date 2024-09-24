-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Sep 22, 2024 at 07:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `tutorial_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer_key` char(1) NOT NULL,
  `time_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_test_questions`
--

CREATE TABLE `exam_test_questions` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `answer_key` char(1) NOT NULL,
  `timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_test_questions`
--

INSERT INTO `exam_test_questions` (`id`, `subject_name`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer_key`, `timeout`) VALUES
(3, 'PYTHON', 'How do you import a module in Python?', '. require \'math\' ', 'using math', 'import math ', 'include math', 'C', '00:00:20'),
(4, 'PYTHON', ' What is a class in Python and how do you define one?', ' class MyClass { ... } ', 'define MyClass: ... ', 'class MyClass: ... ', 'def MyClass: ...', 'C', '00:00:20'),
(5, 'PYTHON', 'How do you write to a file in Python?', ' with open(\'file.txt\', \'w\') as file: file.write(&quot;Hello, file!&quot;) ', 'file = open(\'file.txt\', \'w\'); file.write(&quot;Hello, file!&quot;); file.close() ', ' write(\'file.txt\', \'Hello, file!\') ', ' open(\'file.txt\', \'w\').write(\'Hello, file!\')', 'A', '00:00:20'),
(6, 'PYTHON', ' How do you read from a file in Python?', 'with open(\'file.txt\', \'r\') as file: content = file.read() ', 'file = open(\'file.txt\', \'r\'); content = file.read(); file.close() ', ' file.read(\'file.txt\') ', 'read(\'file.txt\')  Answer: A. with open(\'file.', 'A', '00:00:20'),
(7, 'PYTHON', 'How do you handle exceptions in Python?', ' try { ... } catch (ZeroDivisionError) { ... } ', 'begin ... rescue ZeroDivisionError ... end ', 'C. try: ... except ZeroDivisionError: ... ', 'attempt ... handle ZeroDivisionError: ...', 'C', '00:00:20'),
(8, 'PYTHON', 'How do you access a value from a dictionary using a key?', 'name = my_dict[&quot;name&quot;]', 'name = my_dict.get(&quot;name&quot;) ', 'name = my_dict.name ', 'name = my_dict{name}', 'A', '00:00:20'),
(14, 'Java', 'Which of the following is the correct way to define the main method in Java?', 'public static void main(String[] args)', 'public void main(String[] args)', 'static public void main(String args[])', 'void main(String[] args)', 'A', '00:02:00'),
(15, 'Java', 'Which keyword is used to create a class in Java?', 'class', 'struct', 'object', 'className', 'A', '00:02:00'),
(16, 'Java', 'Which of the following is the correct way to print &quot;Hello, World!&quot; in Java', 'System.out.println(&quot;Hello, World!&quot;);', 'System.out.println(&quot;Hello, World!&quot;);', 'printf(&quot;Hello, World!&quot;);', 'Console.WriteLine(&quot;Hello, World!&quot;);', 'A', '00:02:00'),
(17, 'Java', 'Which keyword is used to inherit a class in Java?', 'extends', 'implements', 'inherits', 'derives', 'A', '00:02:00'),
(18, 'Cryptography and Network Security', 'Which algorithm is known as the first widely used public-key cryptosystem?', 'RSA', ' DES', 'AES', 'MD5', 'A', '00:02:00'),
(19, 'Cryptography and Network Security', 'What does the acronym &quot;AES&quot; stand for in cryptography?', 'Advanced Encryption Standard', 'symmetric Encryption Standard', 'Advanced Encoding Scheme', 'Authenticated Encryption Standard', 'A', '00:02:00'),
(20, 'Cryptography and Network Security', 'Which of the following is a symmetric key encryption technique?', 'DES', 'RSA', 'ECC', 'Diffie-Hellman', 'A', '00:02:00'),
(21, 'Cryptography and Network Security', 'In cryptography, what is the primary purpose of a hash function?', 'To generate a fixed-size string of characters from input data', 'To encrypt data', 'To create public and private keys', 'To encode data in a reversible manner', 'A', '00:02:00'),
(22, 'Cryptography and Network Security', 'Which cryptographic technique uses the same key for both encryption and decryption?', 'Symmetric encryption', 'Asymmetric encryption', 'Hashing', 'Public key encryption', 'A', '00:02:00'),
(23, 'Cryptography and Network Security', 'Which cryptographic algorithm is primarily used for securing digital signatures?', 'DSA (Digital Signature Algorithm)', 'Blowfish', 'Twofish', 'RC4', 'A', '00:02:00'),
(24, 'Artificial Intelligence and Machine Learning', 'Which algorithm is commonly used for supervised learning in machine learning?', 'Linear Regression', ' K-Means Clustering', 'Principal Component Analysis (PCA)', 'Apriori Algorithm', 'A', '00:02:00'),
(25, 'Artificial Intelligence and Machine Learning', 'Which of the following is a type of artificial neural network commonly used for image recognition?', 'A) Convolutional Neural Network (CNN)', 'B) Recurrent Neural Network (RNN)', 'C) Generative Adversarial Network (GAN)', 'Support Vector Machine (SVM)', 'A', '00:02:00'),
(26, 'Artificial Intelligence and Machine Learning', 'Which type of machine learning involves learning from unlabeled data?', 'Unsupervised Learning', ' Supervised Learning', 'Reinforcement Learning', 'Transfer Learning', 'A', '00:02:00'),
(27, 'Artificial Intelligence and Machine Learning', 'Which AI technique is used to enable a machine to learn from past experiences and adapt to new situations?', 'Reinforcement Learning', 'Supervised Learning', 'Unsupervised Learning', 'Deep Learning', 'A', '00:02:00'),
(28, 'Artificial Intelligence and Machine Learning', 'Which of the following is a commonly used evaluation metric for classification models?', 'Accuracy', 'Euclidean Distance', ' Entropy', 'Gradient Descent', 'A', '00:02:00'),
(29, 'Artificial Intelligence and Machine Learning', 'Which of the following algorithms is used for dimensionality reduction in machine learning?', 'Principal Component Analysis (PCA)', 'K-Nearest Neighbors (KNN)', 'Naive Bayes', 'Random Forest', 'A', '00:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `mock_tests`
--

CREATE TABLE `mock_tests` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer_key` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mock_test_questions`
--

CREATE TABLE `mock_test_questions` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `answer_key` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mock_test_questions`
--

INSERT INTO `mock_test_questions` (`id`, `subject_name`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer_key`) VALUES
(1, 'PYTHON', 'n', 'n', 'n', 'n', 'n', 'A'),
(5, 'PYTHON', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', 'B'),
(6, 'PYTHON', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', 'D'),
(7, 'PYTHON', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', 'B'),
(8, 'PYTHON', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', 'B'),
(9, 'PYTHON', 'How do you access the first element of a list?', 'my_list[1] ', 'my_list[first] ', 'my_list[0] ', 'my_list{0}', 'C'),
(10, 'PYTHON', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', 'C'),
(25, 'C Programming', 'What is the correct syntax to declare a variable in C?', 'int x;', 'var x;', 'integer x;', 'declare x;', 'A'),
(26, 'C Programming', 'Which of the following is the correct way to write a comment in C', '// This is a comment', '# This is a comment', '/* This is a comment */', '', 'A'),
(27, 'C Programming', 'What is the correct syntax to include a standard input/output library in C', '#include ', 'import ', '#include ', 'using namespace std;', 'A'),
(28, 'C Programming', 'Which function is used to print text on the screen in C', 'printf(&quot;Hello, World!&quot;);', 'cout ', 'print(&quot;Hello, World!&quot;);', 'cout ', 'A'),
(29, 'C Programming', 'Which of the following is the correct way to start the main function in C', 'int main()', 'void main()', 'public static void main(String[] args)', 'function main()', 'A'),
(30, 'C Programming', 'How do you declare a constant in C', 'const int x = 10;', 'constant int x = 10;', 'final int x = 10;', 'int x = 10;', 'A'),
(31, 'C Programming', 'scanf(&quot;%d&quot;, &amp;x);', 'input(&quot;%d&quot;, &amp;x);', 'cin &gt;&gt; x;', 'input(&quot;%d&quot;, &amp;x);', 'read(&quot;%d&quot;, &amp;x);', 'A'),
(32, 'C Programming', 'Which data type is used to store a single character in C?', 'char', 'string', 'text', 'word', 'A'),
(33, 'C Programming', 'Which of the following operators is used to compare two values in C?', '==', '= ', '=== ', '!=', 'A'),
(34, 'C Programming', 'What is the correct syntax to create a for loop in C?', 'for(int i = 0; i &lt; 10; i++)', 'for i in range(0, 10):', 'for (int i = 0; i ', 'foreach (int i in 10)', 'A'),
(35, 'Data Science', 'Which of the following is a common tool used for data manipulation in Python?', 'Pandas', 'TensorFlow', ' PyTorch', 'Keras', 'A'),
(36, 'Data Science', 'Which of the following techniques is used to handle missing data in a dataset?', 'Imputation', ' Normalization', 'Standardization', 'One-Hot Encoding', 'A'),
(37, 'Data Science', 'Which statistical method is commonly used for predicting a continuous outcome variable?', 'Linear Regression', 'Logistic Regression', 'Decision Tree', 'K-Means Clustering', 'A'),
(38, 'Data Science', 'Which of the following is used to measure the central tendency of a dataset?', 'Mean', ' Variance', 'Standard Deviation', 'Correlation', 'A'),
(39, 'Data Science', 'Which visualization tool is commonly used in Python for creating static, animated, and interactive visualizations?', 'Matplotlib', 'Scikit-learn', 'NLTK', 'OpenCV', 'A'),
(40, 'Project Managment', 'What is project managment?', 'ygkh', 'hjkn', 'gkj,m', 'iyfkh', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `mock_test_results`
--

CREATE TABLE `mock_test_results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `mock_test_score` float NOT NULL,
  `exam_correct` int(11) NOT NULL,
  `exam_wrong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `subject_name`, `mock_test_score`, `exam_correct`, `exam_wrong`) VALUES
(13, 8, 'PYTHON', 0, 3, 4),
(14, 8, 'Java', 0, 4, 0),
(15, 8, 'Cryptography and Network Security', 0, 6, 0),
(16, 8, 'Artificial Intelligence and Machine Learning', 0, 5, 1),
(17, 9, 'Java', 0, 4, 0),
(18, 10, 'Java', 0, 4, 0),
(19, 8, 'Java', 0, 3, 1),
(20, 8, 'Artificial Intelligence and Machine Learning', 0, 6, 0),
(21, 8, 'Artificial Intelligence and Machine Learning', 0, 0, 6),
(22, 8, 'Artificial Intelligence and Machine Learning', 0, 1, 5),
(23, 22, 'Artificial Intelligence and Machine Learning', 0, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `educational_qualification` varchar(100) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `educational_qualification`, `userid`, `password`) VALUES
(8, 'Tejaswini', 21, 'Bachelor Of Engineering', 'Teju', 'Teju@123'),
(9, 'Deekshitha P', 20, 'Bachelor Of Computer Application', 'Deekshitha', 'DEEkshitha@123'),
(10, 'Chandana C', 20, 'B.Tech,M.Tech', 'Chandana12', 'Chandana@123'),
(11, 'Jalaja', 19, 'BCA', 'Jalaja_23', 'Jalaja@123'),
(12, 'Amruth R', 22, 'BE in Electrical and Electronics', 'Amruth@47', 'Amruth@123'),
(13, 'Ravikanth', 19, 'BCA', 'Ravi', 'Ravi@123#'),
(14, 'Nikil', 25, 'BCA,MCA', 'Nikil199', 'Nikil@143'),
(15, 'Susan', 21, 'BCA', 'Susan', 'Susan@12$31'),
(16, 'Nithin', 18, 'II PUC', 'Nith', 'Nith$56_'),
(17, 'Jones', 19, 'II PUC', 'Jones_leo', 'Jones$3#'),
(18, 'Vaishu', 22, 'BCA', 'Vaishu', 'Vaishu$htv'),
(19, 'Hema', 21, 'Bsc', 'Hema', 'HEMA$67&$'),
(20, 'Ron', 23, 'BBA', 'Ron_25', 'Ron$123#'),
(21, 'Padmavathi', 26, 'BCA,MCA', 'Padma', 'Padma#$126'),
(22, 'Savi', 26, 'BCA,MCA,Phd', 'savi', 'savi123');

-- --------------------------------------------------------

--
-- Table structure for table `student_mock_results`
--

CREATE TABLE `student_mock_results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `score_percentage` decimal(5,2) NOT NULL,
  `test_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `tutorials` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `tutorials`) VALUES
(1, 'PYTHON', 'dcmod1.pdf'),
(19, 'C Programming', 'C prog.pdf'),
(20, 'Java', 'java.pdf'),
(21, 'Web Technology', 'Web Development.pdf'),
(22, 'Cryptography and Network Security', 'Crypto.pdf'),
(23, 'Advanced Java', 'Adv java.pdf'),
(24, 'Artificial Intelligence and Machine Learning', 'Aiml.pdf'),
(25, 'HTML & CSS', 'HTML-and-CSS.pdf'),
(26, 'Data Analysis', 'Data analysts .pdf'),
(27, 'Computer Science', 'computer_student and IT .pdf'),
(28, 'Cloud Computing', 'Cloud computing .pdf'),
(29, 'Data Science', 'data_science.pdf'),
(31, 'Project Managment', 'PM.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answer` char(1) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attempt_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `student_id`, `subject_name`, `question_id`, `student_answer`, `correct_answer`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `created_at`, `attempt_number`) VALUES
(1, 1, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-02 13:22:06', 0),
(2, 1, 'savi', 0, 'A', 'A', '1', '1', '1', '1', '1', '2024-08-06 16:48:14', 0),
(3, 1, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-07 04:41:46', 0),
(4, 1, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-07 04:43:19', 0),
(5, 1, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-07 06:05:23', 0),
(6, 3, 'PYTHON', 0, 'B', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-07 07:28:23', 0),
(7, 3, 'PYTHON', 0, 'B', 'B', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', '2024-08-07 07:28:23', 0),
(8, 3, 'PYTHON', 0, 'B', 'D', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', '2024-08-07 07:28:23', 0),
(9, 3, 'PYTHON', 0, 'C', 'B', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', '2024-08-07 07:28:23', 0),
(10, 3, 'PYTHON', 0, 'B', 'B', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', '2024-08-07 07:28:23', 0),
(11, 3, 'PYTHON', 0, 'A', 'C', 'How do you access the first element of a list?', 'my_list[1] ', 'my_list[first] ', 'my_list[0] ', 'my_list{0}', '2024-08-07 07:28:23', 0),
(12, 3, 'PYTHON', 0, 'A', 'C', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', '2024-08-07 07:28:23', 0),
(13, 3, 'Maths', 0, 'A', 'A', 'whats 1+12', '2', '23', '3', '3', '2024-08-07 16:17:25', 0),
(14, 3, 'Maths', 0, 'B', 'C', 'agrh', '7', '7sryg', 'sg', 'usher', '2024-08-07 16:17:25', 0),
(15, 3, 'C Programming', 0, 'B', 'A', ' What is the correct syntax to include a header file in C?', 'A. #include  B. include &quot;header.h&quot; C. #include &quot;header.h&quot; D. include ', 'include &quot;header.h&quot;', '#include &quot;header.h&quot; ', 'include ', '2024-08-08 05:58:11', 0),
(16, 3, 'C Programming', 0, 'C', 'A', 'Which of the following is the correct syntax for a main function in C?', 'int main() ', ' void main() ', 'main() ', 'function main()', '2024-08-08 05:58:11', 0),
(17, 3, 'C Programming', 0, 'C', 'C', 'Which of the following is used to print a string in C? ', 'echo(&quot;Hello, World!&quot;); ', 'print(&quot;Hello, World!&quot;);', 'printf(&quot;Hello, World!&quot;);', 'System.out.println(&quot;Hello, World!&quot;);', '2024-08-08 05:58:11', 0),
(18, 3, 'C Programming', 0, 'C', 'A', 'What is the correct format specifier for an integer in C?', '%d ', '%c ', '%s', '%f', '2024-08-08 05:58:11', 0),
(19, 3, 'C Programming', 0, 'B', 'A', 'How do you declare an integer variable in C?', ' int x; ', 'integer x; ', 'x = int;', 'int: x;', '2024-08-08 05:58:11', 0),
(20, 3, 'C Programming', 0, 'A', 'C', 'How do you create a constant variable in C?', 'constant int x = 5; ', 'int const x = 5; ', 'const int x = 5; ', 'int x = const 5;', '2024-08-08 05:58:11', 0),
(21, 3, 'C Programming', 0, 'B', 'B', 'How do you write a single-line comment in C?', '# This is a comment', '// This is a comment ', '/* This is a comment */ ', '', '2024-08-08 05:58:11', 0),
(22, 3, 'C Programming', 0, 'B', 'C', 'How do you write a multi-line comment in C?', '. # This is a comment ', '// This is a comment ', '/* This is a comment */ ', '', '2024-08-08 05:58:11', 0),
(23, 3, 'C Programming', 0, 'B', 'B', ' Which of the following loops is not available in C?', '. for loop', 'foreach loop', 'while loop ', 'do-while loop', '2024-08-08 05:58:11', 0),
(24, 3, 'C Programming', 0, 'B', 'A', 'How do you create a pointer to an integer in C?', 'int* p; ', 'pointer int p', 'C. int &amp;p; ', 'int p*;', '2024-08-08 05:58:11', 0),
(25, 3, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-19 06:06:45', 0),
(26, 3, 'PYTHON', 0, 'A', 'B', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', '2024-08-19 06:06:45', 0),
(27, 3, 'PYTHON', 0, 'A', 'D', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', '2024-08-19 06:06:45', 0),
(28, 3, 'PYTHON', 0, 'A', 'B', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', '2024-08-19 06:06:45', 0),
(29, 3, 'PYTHON', 0, 'A', 'B', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', '2024-08-19 06:06:45', 0),
(30, 3, 'PYTHON', 0, 'B', 'C', 'How do you access the first element of a list?', 'my_list[1] ', 'my_list[first] ', 'my_list[0] ', 'my_list{0}', '2024-08-19 06:06:45', 0),
(31, 3, 'PYTHON', 0, 'A', 'C', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', '2024-08-19 06:06:45', 0),
(32, 3, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-19 18:33:01', 0),
(33, 3, 'PYTHON', 0, 'B', 'B', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', '2024-08-19 18:33:01', 0),
(34, 3, 'PYTHON', 0, 'B', 'D', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', '2024-08-19 18:33:01', 0),
(35, 3, 'PYTHON', 0, 'B', 'B', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', '2024-08-19 18:33:01', 0),
(36, 3, 'PYTHON', 0, 'A', 'B', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', '2024-08-19 18:33:01', 0),
(37, 3, 'PYTHON', 0, 'A', 'C', 'How do you access the first element of a list?', 'my_list[1] ', 'my_list[first] ', 'my_list[0] ', 'my_list{0}', '2024-08-19 18:33:01', 0),
(38, 3, 'PYTHON', 0, 'B', 'C', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', '2024-08-19 18:33:01', 0),
(39, 3, 'PYTHON', 0, 'A', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-22 06:34:25', 0),
(40, 3, 'PYTHON', 0, 'A', 'B', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', '2024-08-22 06:34:25', 0),
(41, 3, 'PYTHON', 0, 'B', 'D', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', '2024-08-22 06:34:25', 0),
(42, 3, 'PYTHON', 0, 'C', 'B', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', '2024-08-22 06:34:25', 0),
(43, 3, 'PYTHON', 0, 'B', 'B', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', '2024-08-22 06:34:25', 0),
(44, 3, 'PYTHON', 0, 'A', 'C', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', '2024-08-22 06:34:25', 0),
(45, 3, 'C Programming', 0, 'A', 'A', ' What is the correct syntax to include a header file in C?', 'A. #include  B. include &quot;header.h&quot; C. #include &quot;header.h&quot; D. include ', 'include &quot;header.h&quot;', '#include &quot;header.h&quot; ', 'include ', '2024-08-23 08:14:02', 0),
(46, 3, 'C Programming', 0, 'B', 'A', 'Which of the following is the correct syntax for a main function in C?', 'int main() ', ' void main() ', 'main() ', 'function main()', '2024-08-23 08:14:02', 0),
(47, 3, 'C Programming', 0, 'B', 'C', 'Which of the following is used to print a string in C? ', 'echo(&quot;Hello, World!&quot;); ', 'print(&quot;Hello, World!&quot;);', 'printf(&quot;Hello, World!&quot;);', 'System.out.println(&quot;Hello, World!&quot;);', '2024-08-23 08:14:02', 0),
(48, 3, 'C Programming', 0, 'A', 'A', 'What is the correct format specifier for an integer in C?', '%d ', '%c ', '%s', '%f', '2024-08-23 08:14:02', 0),
(49, 3, 'C Programming', 0, 'B', 'A', 'How do you declare an integer variable in C?', ' int x; ', 'integer x; ', 'x = int;', 'int: x;', '2024-08-23 08:14:02', 0),
(50, 3, 'C Programming', 0, 'B', 'C', 'How do you create a constant variable in C?', 'constant int x = 5; ', 'int const x = 5; ', 'const int x = 5; ', 'int x = const 5;', '2024-08-23 08:14:02', 0),
(51, 3, 'C Programming', 0, 'A', 'B', 'How do you write a single-line comment in C?', '# This is a comment', '// This is a comment ', '/* This is a comment */ ', '', '2024-08-23 08:14:02', 0),
(52, 3, 'C Programming', 0, 'B', 'C', 'How do you write a multi-line comment in C?', '. # This is a comment ', '// This is a comment ', '/* This is a comment */ ', '', '2024-08-23 08:14:02', 0),
(53, 3, 'C Programming', 0, 'D', 'B', ' Which of the following loops is not available in C?', '. for loop', 'foreach loop', 'while loop ', 'do-while loop', '2024-08-23 08:14:02', 0),
(54, 3, 'C Programming', 0, 'D', 'A', 'How do you create a pointer to an integer in C?', 'int* p; ', 'pointer int p', 'C. int &amp;p; ', 'int p*;', '2024-08-23 08:14:02', 0),
(55, 8, 'PYTHON', 0, 'B', 'A', 'n', 'n', 'n', 'n', 'n', '2024-08-23 11:35:57', 0),
(56, 8, 'PYTHON', 0, 'A', 'B', 'What is python?', ' A type of snake', 'A high-level, interpreted programming language', 'A type of database', 'An operating system', '2024-08-23 11:35:57', 0),
(57, 8, 'PYTHON', 0, 'A', 'D', 'How do you print &quot;Hello, World!&quot; in Python?', 'echo &quot;Hello, World!&quot;', 'console.log(&quot;Hello, World!&quot;)', 'printf(&quot;Hello, World!&quot;)', 'print(&quot;Hello, World!&quot;)', '2024-08-23 11:35:57', 0),
(58, 8, 'PYTHON', 0, 'A', 'B', 'How do you create a variable and assign a value to it in Python?', 'int x = 5 ', ' x = 5', 'var x = 5 ', 'ix := 5', '2024-08-23 11:35:57', 0),
(59, 8, 'PYTHON', 0, 'A', 'B', 'How do you create a list in Python?', 'my_list = (1, 2, 3, 4, 5) ', 'my_list = [1, 2, 3, 4, 5] ', 'my_list = {1, 2, 3, 4, 5} ', ' my_list = ', '2024-08-23 11:35:57', 0),
(60, 8, 'PYTHON', 0, 'A', 'C', 'How do you access the first element of a list?', 'my_list[1] ', 'my_list[first] ', 'my_list[0] ', 'my_list{0}', '2024-08-23 11:35:57', 0),
(61, 8, 'PYTHON', 0, 'A', 'C', 'How do you write a for loop in Python?', 'for i = 1 to 5: ', 'for (i = 0; i &lt; 5; i++): ', 'for i in range(5): ', 'foreach i in range(5):', '2024-08-23 11:35:57', 0),
(62, 9, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to declare a variable in C?', 'int x;', 'var x;', 'integer x;', 'declare x;', '2024-08-23 11:40:30', 0),
(63, 9, 'C Programming', 0, 'A', 'A', 'Which of the following is the correct way to write a comment in C', '// This is a comment', '# This is a comment', '/* This is a comment */', '', '2024-08-23 11:40:30', 0),
(64, 9, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to include a standard input/output library in C', '#include ', 'import ', '#include ', 'using namespace std;', '2024-08-23 11:40:30', 0),
(65, 9, 'C Programming', 0, 'A', 'A', 'Which function is used to print text on the screen in C', 'printf(&quot;Hello, World!&quot;);', 'cout ', 'print(&quot;Hello, World!&quot;);', 'cout ', '2024-08-23 11:40:30', 0),
(66, 9, 'C Programming', 0, 'A', 'A', 'Which of the following is the correct way to start the main function in C', 'int main()', 'void main()', 'public static void main(String[] args)', 'function main()', '2024-08-23 11:40:30', 0),
(67, 9, 'C Programming', 0, 'A', 'A', 'How do you declare a constant in C', 'const int x = 10;', 'constant int x = 10;', 'final int x = 10;', 'int x = 10;', '2024-08-23 11:40:30', 0),
(68, 9, 'C Programming', 0, 'A', 'A', 'scanf(&quot;%d&quot;, &amp;x);', 'input(&quot;%d&quot;, &amp;x);', 'cin &gt;&gt; x;', 'input(&quot;%d&quot;, &amp;x);', 'read(&quot;%d&quot;, &amp;x);', '2024-08-23 11:40:30', 0),
(69, 9, 'C Programming', 0, 'A', 'A', 'Which data type is used to store a single character in C?', 'char', 'string', 'text', 'word', '2024-08-23 11:40:30', 0),
(70, 9, 'C Programming', 0, 'B', 'A', 'Which of the following operators is used to compare two values in C?', '==', '= ', '=== ', '!=', '2024-08-23 11:40:30', 0),
(71, 9, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to create a for loop in C?', 'for(int i = 0; i &lt; 10; i++)', 'for i in range(0, 10):', 'for (int i = 0; i ', 'foreach (int i in 10)', '2024-08-23 11:40:30', 0),
(72, 8, 'Data Science', 0, 'A', 'A', 'Which of the following is a common tool used for data manipulation in Python?', 'Pandas', 'TensorFlow', ' PyTorch', 'Keras', '2024-08-23 11:51:59', 0),
(73, 8, 'Data Science', 0, 'A', 'A', 'Which of the following techniques is used to handle missing data in a dataset?', 'Imputation', ' Normalization', 'Standardization', 'One-Hot Encoding', '2024-08-23 11:51:59', 0),
(74, 8, 'Data Science', 0, 'A', 'A', 'Which statistical method is commonly used for predicting a continuous outcome variable?', 'Linear Regression', 'Logistic Regression', 'Decision Tree', 'K-Means Clustering', '2024-08-23 11:51:59', 0),
(75, 8, 'Data Science', 0, 'A', 'A', 'Which of the following is used to measure the central tendency of a dataset?', 'Mean', ' Variance', 'Standard Deviation', 'Correlation', '2024-08-23 11:51:59', 0),
(76, 8, 'Data Science', 0, 'B', 'A', 'Which visualization tool is commonly used in Python for creating static, animated, and interactive visualizations?', 'Matplotlib', 'Scikit-learn', 'NLTK', 'OpenCV', '2024-08-23 11:51:59', 0),
(77, 8, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to declare a variable in C?', 'int x;', 'var x;', 'integer x;', 'declare x;', '2024-08-23 16:35:11', 0),
(78, 8, 'C Programming', 0, 'A', 'A', 'Which of the following is the correct way to write a comment in C', '// This is a comment', '# This is a comment', '/* This is a comment */', '', '2024-08-23 16:35:11', 0),
(79, 8, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to include a standard input/output library in C', '#include ', 'import ', '#include ', 'using namespace std;', '2024-08-23 16:35:11', 0),
(80, 8, 'C Programming', 0, 'C', 'A', 'Which function is used to print text on the screen in C', 'printf(&quot;Hello, World!&quot;);', 'cout ', 'print(&quot;Hello, World!&quot;);', 'cout ', '2024-08-23 16:35:11', 0),
(81, 8, 'C Programming', 0, 'A', 'A', 'Which of the following is the correct way to start the main function in C', 'int main()', 'void main()', 'public static void main(String[] args)', 'function main()', '2024-08-23 16:35:11', 0),
(82, 8, 'C Programming', 0, 'A', 'A', 'How do you declare a constant in C', 'const int x = 10;', 'constant int x = 10;', 'final int x = 10;', 'int x = 10;', '2024-08-23 16:35:11', 0),
(83, 8, 'C Programming', 0, 'A', 'A', 'Which data type is used to store a single character in C?', 'char', 'string', 'text', 'word', '2024-08-23 16:35:11', 0),
(84, 8, 'C Programming', 0, 'A', 'A', 'Which of the following operators is used to compare two values in C?', '==', '= ', '=== ', '!=', '2024-08-23 16:35:11', 0),
(85, 8, 'C Programming', 0, 'A', 'A', 'What is the correct syntax to create a for loop in C?', 'for(int i = 0; i &lt; 10; i++)', 'for i in range(0, 10):', 'for (int i = 0; i ', 'foreach (int i in 10)', '2024-08-23 16:35:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_test_questions`
--
ALTER TABLE `exam_test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mock_tests`
--
ALTER TABLE `mock_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mock_test_questions`
--
ALTER TABLE `mock_test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mock_test_results`
--
ALTER TABLE `mock_test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `student_mock_results`
--
ALTER TABLE `student_mock_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_test_questions`
--
ALTER TABLE `exam_test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mock_tests`
--
ALTER TABLE `mock_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mock_test_questions`
--
ALTER TABLE `mock_test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mock_test_results`
--
ALTER TABLE `mock_test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_mock_results`
--
ALTER TABLE `student_mock_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
