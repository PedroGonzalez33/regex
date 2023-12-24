// 2018-06-04,Italy,Netherlands,1,1,Friendly,Turin,Italy,FALSE
// 2018-06-04,Serbia,Chile,0,1,Friendly,Graz,Austria,TRUE
// 2018-06-04,Slovakia,Morocco,1,2,Friendly,Geneva,Switzerland,TRUE
// 2018-06-04,Armenia,Moldova,0,0,Friendly,Kematen,Austria,TRUE
// 2018-06-04,India,Kenya,3,0,Friendly,Mumbai,India,FALSE 

// Codigo para leer un archivo en Java

// import java.io.BufferedReader;
// import java.io.FileReader;
// import java.io.IOException;

//public  class regex{
//    public static void main(String[] args){
//        String file = "./results.csv";

//        try{
//            BufferedReader br = new BufferedReader(new FileReader(file));
//            String line;
//            while((line = br.readLine()) != null){
//                System.out.println(line);
//            }
//        }catch (IOException e){
//            System.out.println("nope!");
//        }
//    }
//}

// Codigo aplicando regex
import java.io.FileReader;
import java.io.BufferedReader;
import java.io.IOException;
import java.util.regex.Pattern;
import java.util.regex.Matcher;

public class regex{
    public static void main(String args[]) {
        String file = "../Curso de Expresiones Regulares/results.csv";
        Pattern pat = Pattern.compile("^2011\\-.*[zk].*$");
        try {
            BufferedReader br = new BufferedReader(new FileReader(file));
            String line;
            while ((line = br.readLine()) != null) {
                Matcher matcher = pat.matcher(line);
                if (matcher.find()) {
                    System.out.println(line);
                }
            }
            br.close();
        } catch (IOException e) {
            System.out.println("Nope!!: " + e);
        }
    }
}