public class ArrayIndex {
   public static void main (String args[]) {
      int x[] = {5,15,20};
      int m = 9, n = 3;
      int result = 10;
      try {
         result = m/n;
         System.out.println("The result is" +result);
         for(int i = 5; i >= 0; i--) {
            System.out.println("The value of array is" +x[i]);
         }
      } catch (ArrayIndexOutOfBoundsException e) {
         System.out.println("Array is out of Bounds"+e);
      } catch (ArithmeticException e) {
         System.out.println ("Can't divide by Zero"+e);
      }
   }
}